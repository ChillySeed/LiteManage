@extends('layouts.app')

@section('title', 'Edit Sales - LiteManage')

@section('content')
    <p class="LME-tabletitle">Edit Sales</p>
        <div class="LME-formwrapper">
            <div class="LME-formmcontainer">
                <form action="{{ route('sales.update', $sales->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Customer</label>
                        <select name="customer_id" class="LME-input" required>
                            <option value="">-- Select Customer --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" 
                                    {{ $sales->customer_id == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->customer_phone }} ({{ $customer->customer_email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Sale Date</label>
                        <input type="date" name="date" value="{{ $sales->date }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Total Amount</label>
                        <input type="number" step="0.01" name="total_amount" value="{{ $sales->total_amount }}"class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Payment Method</label>
                        <select name="payment_method" class="LME-input" required>
                            <option value="">-- Select Payment Method --</option>
                            <option value="cash"   {{ $sales->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                            <option value="debit"  {{ $sales->payment_method == 'debit' ? 'selected' : '' }}>Debit</option>
                            <option value="credit" {{ $sales->payment_method == 'credit' ? 'selected' : '' }}>Credit Card</option>
                            <option value="ewallet" {{ $sales->payment_method == 'ewallet' ? 'selected' : '' }}>E-Wallet</option>
                        </select>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Note</label>
                        <input type="text" name="note" value="{{ $sales->note }}" class="LME-input">
                    </div>

            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
@endsection
