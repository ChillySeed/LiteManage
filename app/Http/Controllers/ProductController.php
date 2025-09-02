<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // or ->paginate(10)
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'product_name'     => 'required|string|max:255',
        'product_brand'    => 'required|string|max:255',
        'product_category' => 'required|string|max:255',
        'product_price'    => 'required|numeric',
        'product_stock'    => 'required|integer',
        'product_unit'     => 'required|string|max:50',
        'product_barcode'  => 'required|string|unique:products,product_barcode',
        'expiration_date'  => 'nullable|date',
        ]);

        Product::create($request->all()); // save to DB

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'product_name'     => 'required|string|max:255',
            'product_brand'    => 'required|string|max:255',
            'product_category' => 'required|string|max:255',
            'product_price'    => 'required|numeric|min:0',
            'product_stock'    => 'required|integer|min:0',
            'product_unit'     => 'required|string|max:50',
            'product_barcode'  => 'required|string|unique:products,product_barcode,' . $product->id,
            'expiration_date'  => 'nullable|date',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id); // find the product
        $product->delete(); // delete from DB

        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }

}
