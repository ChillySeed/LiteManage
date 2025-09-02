@extends('layouts.app')

@section('title', 'Sale Items - LiteManage')

@section('content')
    <p class="LME-tabletitle">Sale Items</p>

    <about-content>
        <div class="LME-tablecontainer">
            <div style="margin-bottom: 16px; text-align:right;">
                <a href="{{ route('sale_items.create') }}" class="LME-btn-add">+ Add New Sale</a>
            </div>

            <table class="LME-datatable">
                <thead>
                    <tr>
                        <th class="LME-tablestyle">ID</th>
                        <th class="LME-tablestyle">Created At</th>
                        <th class="LME-tablestyle">Updated At</th>
                        <th class="LME-tablestyle">Sale ID</th>
                        <th class="LME-tablestyle">Product Name</th>
                        <th class="LME-tablestyle">Quantity</th>
                        <th class="LME-tablestyle">Price Sold</th>
                        <th class="LME-tablestyle">Subtotal</th>
                        <th class="LME-tablestyle">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale_items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>{{ $item->sale->id }}</td>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->subtotal }}</td>
                        <td>
                            <a href="{{ route('sale_items.edit', $item->id) }}" class="LME-btn-edit" >Edit</a>
                            <form action="{{ route('sale_items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="LME-btn-delete" onclick="return confirm('Delete this Customer?')">
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
