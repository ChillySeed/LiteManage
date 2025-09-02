@extends('layouts.app')

@section('title', 'Customers - LiteManage')

@section('content')
    <p class="LME-tabletitle">Customers Data</p>

    <about-content>
        <div class="LME-tablecontainer">
            <div style="margin-bottom: 16px; text-align:right;">
                <a href="{{ route('customers.create') }}" class="LME-btn-add">+ Add New Customer</a>
            </div>

            <table class="LME-datatable">
                <thead>
                    <tr>
                        <th class="LME-tablestyle">ID</th>
                        <th class="LME-tablestyle">Created At</th>
                        <th class="LME-tablestyle">Updated At</th>
                        <th class="LME-tablestyle">Email</th>
                        <th class="LME-tablestyle">Phone</th>
                        <th class="LME-tablestyle">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->updated_at }}</td>
                        <td>{{ $customer->customer_phone }}</td>
                        <td>{{ $customer->customer_email }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="LME-btn-edit">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
