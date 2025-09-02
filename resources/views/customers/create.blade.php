@extends('layouts.app')

@section('title', 'Customers - LiteManage')

@section('content')
    <p class="LME-tabletitle">Customers Data Creator</p>

    <div class="LME-formwrapper">
        <form action="{{ route('customers.store') }}" method="POST" class="LME-form">
            @csrf

            <div class="LME-formcontainer">
                <label class="LME-formtext">Customer Email</label>
                <input type="text" name="customer_email" class="LME-input" required>
            </div>

            <div class="LME-formcontainer">
                <label class="LME-formtext">Customer Phone</label>
                <input type="text" name="customer_phone" class="LME-input" required>
            </div>
            <div class="LME-buttonrow">
                <button type="submit" class="LME-btn-save">💾 Save</button>
                <a href="{{ route('customers.index') }}" class="LME-btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
@endsection
