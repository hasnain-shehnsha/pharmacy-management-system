<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->contact_no = $request->contact_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->save();
        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully!');
    }

    public function edit(Request $request)
    {
        $supplier = Supplier::find($request->id);
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request)
    {
        $supplier = Supplier::find($request->id);
        $supplier->name = $request->name;
        $supplier->contact_no = $request->contact_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->save();
        return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully!');
    }

    
    public function destroy(Request $request)
    {
        $supplier = Supplier::find($request->id);

        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully!');
    }

    public function show(Request $request)
    {
        $supplier = Supplier::find($request->id);
        return view('suppliers.show', compact('supplier'));
    }
}
