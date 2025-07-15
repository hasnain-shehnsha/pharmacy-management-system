<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }


    public function create()
    {
        return view('customers.create');
    }

   
    public function store(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->contact_no = $request->contact_no;
        $customer->save();
        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    public function show(Request $request)
    {
        $customer = Customer::find($request->id);
        return view('customers.show', compact('customer'));
    }

    public function edit(Request $request)
    {
        $customer = Customer::find($request->id);
        return view('customers.edit', compact('customer'));
    }

    
    public function update(Request $request)
    {
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->contact_no = $request->contact_no;
        $customer->save();
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        if ($customer && method_exists($customer, 'sales') && $customer->sales()->exists()) {
            return redirect()->route('customers.index')->with('error', 'Cannot delete: Customer has sales.');
        }
        if ($customer) {
            $customer->delete();
        }
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }

    public function quickAdd(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->contact_no = $request->contact_no;
        $customer->save();
        return response()->json(['success' => true, 'customer' => $customer]);
    }
}
