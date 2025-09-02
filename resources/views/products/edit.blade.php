@extends('layouts.app')

@section('title', 'Edit Product - LiteManage')

@section('content')
    <p class="LME-tabletitle">Edit Product</p>
        <div class="LME-formwrapper">
            <div class="LME-formmcontainer">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Product Name</label>
                        <input type="text" name="product_name" value="{{ $product->product_name }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Brand</label>
                        <input type="text" name="product_brand" value="{{ $product->product_brand }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Category</label>
                        <input type="text" name="product_category" value="{{ $product->product_category }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Price</label>
                        <input type="number" step="0.01" name="product_price" value="{{ $product->product_price }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Stock</label>
                        <input type="number" name="product_stock" value="{{ $product->product_stock }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Unit</label>
                        <input type="text" name="product_unit" value="{{ $product->product_unit }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Barcode</label>
                        <input type="text" name="product_barcode" value="{{ $product->product_barcode }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Expiration Date</label>
                        <input type="month" name="expiration_date"  value="{{ $product->expiration_date }}" class="LME-input">
                    </div>
        </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
@endsection
