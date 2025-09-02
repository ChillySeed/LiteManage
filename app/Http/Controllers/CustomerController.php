<?php

namespace App\Http\Controllers;
use App\Models\customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = customers::all(); // or ->paginate(10)
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_phone'     => 'required|string|max:255',
            'customer_email'    => 'required|string|max:255'
        ]);

        customers::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id)
    {
        $customer = customers::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $customer = customers::findOrFail($id);

        $request->validate([
            'customer_phone'     => 'required|string|max:255',
            'customer_email'    => 'required|string|max:255'
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = customers::findOrFail($id); // find the product
        $customer->delete(); // delete from DB

        return redirect()->route('customers.index')->with('success', 'Customer deleted.');
    }
}
