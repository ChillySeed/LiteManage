@extends('layouts.app')

@section('title', 'Edit Customer - LiteManage')

@section('content')
    <p class="LME-tabletitle">Edit Customer</p>
        <div class="LME-formwrapper">
            <div class="LME-formmcontainer">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Email</label>
                        <input type="text" name="customer_email" value="{{ $customer->customer_email }}" class="LME-input" required>
                    </div>

                    <div class="LME-formcontainer">
                        <label class="LME-formtext">Phone</label>
                        <input type="text" name="customer_phone" value="{{ $customer->customer_phone }}" class="LME-input" required>
                    </div>

            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
@endsection
