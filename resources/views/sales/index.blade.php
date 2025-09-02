@extends('layouts.app')

@section('title', 'Sales - LiteManage')

@section('content')
    <p class="LME-tabletitle">Sales Data</p>

    <about-content>
        <div class="LME-tablecontainer">
            <div style="margin-bottom: 16px; text-align:right;">
                <a href="{{ route('sales.create') }}" class="LME-btn-add">+ Add New Sale</a>
            </div>

            <table class="LME-datatable">
                <thead>
                    <tr>
                        <th class="LME-tablestyle">ID</th>
                        <th class="LME-tablestyle">Created At</th>
                        <th class="LME-tablestyle">Updated At</th>
                        <th class="LME-tablestyle">Customer Email</th>
                        <th class="LME-tablestyle">Sale Added</th>
                        <th class="LME-tablestyle">Total Amount</th>
                        <th class="LME-tablestyle">Payment Method</th>
                        <th class="LME-tablestyle">Note</th>
                        <th class="LME-tablestyle">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->created_at }}</td>
                        <td>{{ $sale->updated_at }}</td>
                        <td>{{ $sale->customer?->customer_email ?? 'N/A' }}</td>
                        <td>{{ $sale->date }}</td>
                        <td>{{ $sale->total_amount }}</td>
                        <td>{{ $sale->payment_method }}</td>
                        <td>{{ $sale->note }}</td>
                        <td>
                            <a href="{{ route('sales.edit', $sale->id) }}" class="LME-btn-edit">Edit</a>
                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
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
