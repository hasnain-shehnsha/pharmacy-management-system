<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->category = $request->category;
        $medicine->company_name = $request->company_name;
        $medicine->batch_no = $request->batch_no;
        $medicine->quantity = $request->quantity;
        $medicine->price = $request->price;
        $medicine->expiry_date = $request->expiry_date;
        $medicine->description = $request->description;
        $medicine->save();
        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully!');
    }

    public function edit(Request $request)
    {
        $medicine = Medicine::find($request->id);
        return view('medicines.edit', compact('medicine'));
    }

    
    public function update(Request $request)
    {
        $medicine = Medicine::find($request->id);
        $medicine->name = $request->name;
        $medicine->category = $request->category;
        $medicine->company_name = $request->company_name;
        $medicine->batch_no = $request->batch_no;
        $medicine->quantity = $request->quantity;
        $medicine->price = $request->price;
        $medicine->expiry_date = $request->expiry_date;
        $medicine->description = $request->description;
        $medicine->save();
        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully!');
    }

    public function destroy(Request $request)
    {
        $medicine = Medicine::find($request->id);
        if ($medicine) {
            $medicine->delete();
        }
        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully!');
    }

    public function show(Request $request)
    {
        $medicine = Medicine::find($request->id);
        return view('medicines.show', compact('medicine'));
    }
}
