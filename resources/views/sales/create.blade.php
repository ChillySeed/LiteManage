@extends('layouts.app')

@section('title', 'Sales - LiteManage')

@section('content')
    <p class="LME-tabletitle">Sales Data Creator</p>

    <div class="LME-formwrapper">
        <form action="{{ route('sales.store') }}" method="POST" class="LME-form">
            @csrf

            <div class="LME-formcontainer">
                <label class="LME-formtext">Customer</label>
                <select name="customer_id" class="LME-input" required>
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">
                            {{ $customer->customer_phone }} ({{ $customer->customer_email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Sale Date</label>
                <input type="date" name="date" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Total Amount</label>
                <input type="number" step="0.01" name="total_amount" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Payment Method</label>
                <select name="payment_method" class="LME-input" required>
                    <option value="">-- Select Payment Method --</option>
                    <option value="cash">Cash</option>
                    <option value="debit">Debit</option>
                    <option value="credit">Credit Card</option>
                    <option value="ewallet">E-Wallet</option>
                </select>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Note</label>
                <input type="text" name="note" class="LME-input">
            </div>

            <div class="LME-buttonrow">
                <button type="submit" class="LME-btn-save">💾 Save</button>
                <a href="{{ route('sales.index') }}" class="LME-btn-cancel">Cancel</a>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
