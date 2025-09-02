<?php

namespace App\Http\Controllers;
use App\Models\SaleItem;
use App\Models\sales;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eager load product + sale to avoid N+1 queries
        $sale_items = SaleItem::with(['product', 'sale'])->get();
        return view('sale_items.index', compact('sale_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sales = sales::all();       // needed for dropdown
        $products = Product::all(); // needed for dropdown
        return view('sale_items.create', compact('sales', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sale_id'    => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        SaleItem::create($request->all());

        return redirect()->route('sale_items.index')
                         ->with('success', 'Sale item added successfully.');
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
    public function edit($id)
    {
        $sale_item = SaleItem::findOrFail($id);
        $sales = sales::all();
        $products = Product::all();

        return view('sale_items.edit', compact('sale_item', 'sales', 'products'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sale_id'    => 'required|exists:sales,id',
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
        ]);

        $sale_item = SaleItem::findOrFail($id);
        $sale_item->update($request->all());

        return redirect()->route('sale_items.index')
                         ->with('success', 'Sale item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale_item = SaleItem::findOrFail($id);
        $saleId = $sale_item->sale_id;
        $sale_item->delete();

        return redirect()->route('sales.show', $saleId)
                         ->with('success', 'Item deleted successfully.');
    }
}
