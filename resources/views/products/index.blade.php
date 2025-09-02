@extends('layouts.app')

@section('title', 'Products - LiteManage')

@section('content')
    <p class="LME-tabletitle">Products Data</p>

    <about-content>
        <div class="LME-tablecontainer">
            <div style="margin-bottom: 16px; text-align:right;">
                <a href="{{ route('products.create') }}" class="LME-btn-add">+ Add New Product</a>
            </div>

            <table class="LME-datatable">
                <thead>
                    <tr>
                        <th class="LME-tablestyle">ID</th>
                        <th class="LME-tablestyle">Created At</th>
                        <th class="LME-tablestyle">Updated At</th>
                        <th class="LME-tablestyle">Name</th>
                        <th class="LME-tablestyle">Brand</th>
                        <th class="LME-tablestyle">Category</th>
                        <th class="LME-tablestyle">Price</th>
                        <th class="LME-tablestyle">Stock</th>
                        <th class="LME-tablestyle">Unit</th>
                        <th class="LME-tablestyle">Barcode</th>
                        <th class="LME-tablestyle">Expiration Date</th>
                        <th class="LME-tablestyle">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_brand }}</td>
                        <td>{{ $product->product_category }}</td>
                        <td>${{ $product->product_price }}</td>
                        <td>{{ $product->product_stock }}</td>
                        <td>{{ $product->product_unit }}</td>
                        <td>{{ $product->product_barcode }}</td>
                        <td>{{ $product->expiration_date }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="LME-btn-edit">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="LME-btn-delete" onclick="return confirm('Delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </about-content>
@endsection
