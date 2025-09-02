@extends('layouts.app')

@section('title', 'About - LiteManage')

@section('content')
    <about-content>
        <P class="aboutLME-headtop">
            What is Lite Manage?
        </P>
        <p class="aboutLME-head1">
            Description
        </p>
        <p class="aboutLME-content">
            LiteManage is a lightweight, single-store Inventory and 
            Sales Management System built using Laravel, tailored for 
            small shops or kiosks dealing in non-perishable food items 
            such as canned goods, bottled drinks, and dry groceries.
        </p>
        <p class="aboutLME-content">
            Designed to be simple, intuitive, and efficient, 
            LiteManage provides essential tools for product tracking, 
            customer management, and daily sales operations without the 
            overhead of complex enterprise features.
        </p>
        <div>
            <p class="aboutLME-head1">Key Features</p>
            <p class="aboutLME-head2"> &#183; Sales Recording</p>
            <P class="aboutLME-content"> Easily log customer purchases and manage multiple product line-items in one sale.</P>
            <p class="aboutLME-head2"> &#183; Inventory Management</p>
            <P class="aboutLME-content"> Add and update products, monitor stock levels, and receive low-stock alerts.</P>
            <p class="aboutLME-head2"> &#183; Dashboard Overview</p>
            <P class="aboutLME-content"> Get a snapshot of total sales, product stock, and top-selling items.</P>
            <p class="aboutLME-head2"> &#183; Customer Management</p>
            <P class="aboutLME-content"> Store customer contact information and track purchase history.</P>
            <p class="aboutLME-head2"> &#183; Revenue Tracking</p>
            <P class="aboutLME-content"> Automatically calculate subtotal, total, and individual product pricing at time of sale.</P>
        </div>
        <div>
            <p class="aboutLME-head2"> Built With</p>
            <P class="aboutLME-content"> &#183; Laravel</P>
            <P class="aboutLME-content"> &#183; SQL</P>
            <P class="aboutLME-content"> &#183; Bootstrap</P>
            <P class="aboutLME-content"> &#183; Blade Templating</P>
        </div>
        <div>
            <p class="aboutLME-dochead">
                Documentation can be found
            </p>
            <a class="aboutLME-docheadlink" href="{{ url('/dashboard') }}">
                here
            </a>
        </div>
    </about-content>
@endsection
