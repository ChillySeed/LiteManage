<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'LiteManage')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('litemanage.ico') }}" type="image/x-icon">
</head>
<body>
    <title-content class="title-content">
        <a class="titletext" href="main.html">LiteManage</a>
    </title-content>

    <nav-content>
        <a class="navlinks" href="{{ url('/dashboard') }}"> Dashboard </a>
        <a class="navlinks" href="{{ url('/sale_items') }}"> Item Sales </a>
        <a class="navlinks" href="{{ url('/sales') }}"> Sales </a>
        <a class="navlinks" href="{{ url('/customers') }}"> Customers </a>
        <a class="navlinks" href="{{ url('/products') }}"> Products </a>
        <a class="navlinks" href="{{ url('/about') }}"> About </a>
    </nav-content>

    <tab-content>
        @yield('content')
    </tab-content>
</body>
</html>