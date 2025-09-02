<?php

namespace App\Http\Controllers;
use App\Models\customers;
use App\Models\sales;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = sales::with('customer')->get(); // load sales + related customers
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = customers::all(); // fetch all customers
        return view('sales.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
        'customer_id'    => 'required|exists:customers,id',
        'date'             => 'required|string|max:255',
        'total_amount'     => 'required|string|max:255',
        'payment_method'  => 'required|in:cash,debit,credit,ewallet',
        'note'             => 'nullable|string|max:50',
        ]);
        
        sales::create($request->all()); // save to DB

        return redirect()->route('sales.index')->with('success', 'Sales created successfully.');
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
        $sales = sales::findOrFail($id);
        $customers = customers::all(); 
        return view('sales.edit', compact('sales', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $sales = sales::findOrFail($id);

        $request->validate([
        'date'            => 'required|string|max:255',
        'total_amount'    => 'required|string|max:255',
        'payment_method'  => 'required|in:cash,debit,credit,ewallet',
        'note'            => 'nullable|string|max:50',
        ]);
        
        $sales->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sales = sales::findOrFail($id); // find the product
        $sales->delete(); // delete from DB

        return redirect()->route('sales.index')->with('success', 'Sale deleted.');
    }
}
