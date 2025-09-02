@extends('layouts.app')

@section('title', 'Edit Sales - LiteManage')

@section('content')
    <p class="LME-tabletitle">Edit Sales</p>
        <div class="LME-formwrapper">
            <div class="LME-formmcontainer">
                <form action="{{ route('sale_items.update', $sale_item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Sale ID</label>
                        <select name="sale_id" required>
                            @foreach($sales as $sale)
                                <option value="{{ $sale->id }}" {{ $sale->id == $sale_item->sale_id ? 'selected' : '' }}>
                                    {{ $sale->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Product Name</label>
                        <select name="product_id" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $product->id == $sale_item->product_id ? 'selected' : '' }}>
                                    {{ $product->product_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Quantity</label>
                        <input type="number" name="quantity" value="{{ $sale_item->quantity }}" min="1" required>
                    </div>

                    
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('sale_items.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
@endsection
