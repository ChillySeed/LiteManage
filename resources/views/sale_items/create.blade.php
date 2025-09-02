@extends('layouts.app')

@section('title', 'Add Sale Item - LiteManage')

@section('content')
    <p class="LME-tabletitle">Sale Item Creator</p>

    <div class="LME-formwrapper">
        <form action="{{ route('sale_items.store') }}" method="POST" class="LME-form">
            @csrf

            <div class="LME-formcontainer">
                <label class="LME-formtext">Sale</label>
                <select name="sale_id" class="LME-input" required>
                    <option value="">-- Select Sale --</option>
                    @foreach($sales as $sale)
                        <option value="{{ $sale->id }}">
                            Sale #{{ $sale->id }} ({{ $sale->date }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Product</label>
                <select name="product_id" class="LME-input" required>
                    <option value="">-- Select Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">
                            {{ $product->product_name }} (${{ number_format($product->product_price , 0) }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Quantity</label>
                <input type="number" name="quantity" min="1" class="LME-input" required>
            </div>

            <div class="LME-buttonrow">
                <button type="submit" class="LME-btn-save">💾 Save</button>
                <a href="{{ route('sale_items.index') }}" class="LME-btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection
