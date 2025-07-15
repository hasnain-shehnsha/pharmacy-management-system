<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Customer;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $medicines = Medicine::where('quantity', '>', 0)->get();
        return view('sales.create', compact('customers', 'medicines'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $total = 0;
            $items = [];
            foreach ($request->medicines as $i => $medicine_id) {
                $medicine = Medicine::find($medicine_id);
                $qty = $request->quantities[$i];
                if ($medicine->quantity < $qty) {
                    throw new \Exception("Not enough stock for {$medicine->name}");
                }
                
                $sale_price = (int) ceil($medicine->price * 1.18);
                $line_total = $sale_price * $qty;
                $total += $line_total;
                $items[] = [
                    'medicine_id' => $medicine->id,
                    'quantity' => $qty,
                    'price' => $sale_price,
                    'total_amount' => $line_total,
                ];
            }
            $sale = new Sale();
            $sale->customer_id = $request->customer_id;
            $sale->total_amount = $total;
            $sale->save();
            foreach ($items as $item) {
                $item['sale_id'] = $sale->id;
                $saleItem = new SaleItem();
                $saleItem->sale_id = $item['sale_id'];
                $saleItem->medicine_id = $item['medicine_id'];
                $saleItem->quantity = $item['quantity'];
                $saleItem->price = $item['price'];
                $saleItem->total = $item['price'] * $item['quantity'];
                $saleItem->save();
                
                $med = Medicine::find($item['medicine_id']);
                $med->quantity -= $item['quantity'];
                $med->save();
            }
            DB::commit();
            return redirect()->route('sales.index')->with('success', 'Sale recorded successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function show(Request $request)
    {
        $sale = Sale::with('customer', 'items.medicine')->find($request->id);
        return view('sales.show', compact('sale'));
    }

    // Delete sale
    public function destroy(Request $request)
    {
        $sale = Sale::find($request->id);
        if ($sale) {
            foreach ($sale->items as $item) {
                $medicine = Medicine::find($item->medicine_id);
                if ($medicine) {
                    $medicine->quantity += $item->quantity;
                    $medicine->save();
                }
            }
            $sale->delete();
        }
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully!');
    }
}
