@extends('layouts.app')

@section('title', 'Products - LiteManage')

@section('content')
    <p class="LME-tabletitle">Products Data Creator</p>

    <div class="LME-formwrapper">
        <form action="{{ route('products.store') }}" method="POST" class="LME-form">
            @csrf

            <div class="LME-formcontainer">
                <label class="LME-formtext">Product Name</label>
                <input type="text" name="product_name" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Brand</label>
                <input type="text" name="product_brand" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Category</label>
                <input type="text" name="product_category" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Price</label>
                <input type="number" step="0.01" name="product_price" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Stock</label>
                <input type="number" name="product_stock" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Unit</label>
                <input type="text" name="product_unit" class="LME-input" placeholder="pcs, kg, box" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Barcode</label>
                <input type="text" name="product_barcode" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Expiration Date</label>
                <input type="month" name="expiration_date" class="LME-input">
            </div>

            <div class="LME-buttonrow">
                <button type="submit" class="LME-btn-save">💾 Save</button>
                <a href="{{ route('products.index') }}" class="LME-btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection
