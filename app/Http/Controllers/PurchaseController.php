<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Medicine;
use App\Models\PurchaseItem;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $medicines = Medicine::all();
        return view('purchases.create', compact('suppliers', 'medicines'));
    }

    public function store(Request $request)
    {
        
        $total = 0;
        $items = [];

        foreach($request->medicines as $i => $medicineId ){
            $qty = (int) $request->quantities[$i];
            $price = (float) $request->prices[$i];
            $total += $qty * $price;
            $items[] = [
                'medicine_id' => $medicineId,
                'quantity' => $qty,
                'price' => $price,
                'total' => $qty * $price,
            ];

        }

        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->total_amount = $total;
        $purchase->purchase_date = now();
        $purchase->save();
        dd($purchase->id);
        foreach ($items as $item) {
            $item['purchase_id'] = $purchase->id;
            PurchaseItem::create($item);
            $medicine = Medicine::find($item['medicine_id']);
            if ($medicine) {
                $medicine->quantity += $item['quantity'];
                $medicine->price = $item['price'];
                $medicine->save();
            }
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');



        // \DB::beginTransaction();
        // try {
        //     $total = 0;
        //     $items = [];
        //     foreach ($request->medicines as $i => $medicineId) {
        //         if (empty($medicineId) || empty($request->quantities[$i]) || !isset($request->prices[$i])) {
        //             continue;
        //         }
        //         $qty = (int) $request->quantities[$i];
        //         $price = (float) $request->prices[$i];
        //         if ($qty <= 0 || $price < 0) {
        //             continue;
        //         }
        //         $total += $qty * $price;
        //         $items[] = [
        //             'medicine_id' => $medicineId,
        //             'quantity' => $qty,
        //             'price' => $price,
        //             'total' => $qty * $price,
        //         ];
        //     }
        //     if (empty($items)) {
        //         return back()->withErrors(['error' => 'At least one valid medicine item is required.'])->withInput();
        //     }
        //     $purchase = new Purchase();
        //     $purchase->supplier_id = $request->supplier_id;
        //     $purchase->total_amount = $total;
        //     $purchase->purchase_date = now();
        //     $purchase->save();
        //     foreach ($items as $item) {
        //         $item['purchase_id'] = $purchase->id;
        //         PurchaseItem::create($item);
        //         $medicine = Medicine::find($item['medicine_id']);
        //         if ($medicine) {
        //             $medicine->quantity += $item['quantity'];
        //             $medicine->price = $item['price'];
        //             $medicine->save();
        //         }
        //     }
        //     \DB::commit();
        //     return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
        // } catch (\Exception $e) {
        //     \DB::rollBack();
        //     return back()->withErrors(['error' => $e->getMessage()])->withInput();
        // }
    }

    
    public function show(Request $request)
    {
        $purchase = Purchase::with(['supplier', 'purchaseItems.medicine'])->find($request->id);
        return view('purchases.show', compact('purchase'));
    }

    public function edit(Request $request)
    {

    }

    
    public function update(Request $request)
    {
       
    }

    
    public function destroy(Request $request)
    {
        $purchase = Purchase::with('purchaseItems')->find($request->id);
        foreach ($purchase->purchaseItems as $item) {
            $medicine = Medicine::find($item->medicine_id);
            if ($medicine) {
                $medicine->quantity -= $item->quantity;
                $medicine->save();
            }
        }
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully!');
    }
}
