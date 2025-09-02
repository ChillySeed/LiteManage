@extends('layouts.app')

@section('title', 'Dashboard - LiteManage')

@section('content')
    <p class="LME-tabletitle">Dashboard</p>

    {{-- 🔹 Summary Cards --}}
    <div class="LME-dashboard">
        <div class="LME-card blue">
            <h3>Total Sales Today</h3>
            <div class="value">$ {{ number_format($totalSalesToday, 0, ',', '.') }}</div>
        </div>
        <div class="LME-card green">
            <h3>Transactions Today</h3>
            <div class="value">{{ $transactionsToday }}</div>
        </div>
        <div class="LME-card orange">
            <h3>This Month Revenue</h3>
            <div class="value">$ {{ number_format($totalRevenueMonth, 0, ',', '.') }}</div>
        </div>
        <div class="LME-card red">
            <h3>Low Stock Alerts</h3>
            <div class="value">{{ $lowStockCount }}</div>
        </div>
    </div>

    {{-- 🔹 Sales Trend Chart --}}
    <div class="LME-chart">
        <h3>Sales Trend (Last 7 Days)</h3>
        <canvas id="salesTrend"></canvas>
    </div>

    {{-- 🔹 Top-Selling Products --}}
    <div class="LME-section">
        <h2>Top Selling Products</h2>
        <table class="LME-table-mini">
            <thead>
                <tr><th>Product</th><th>Units Sold</th><th>Total Revenue</th></tr>
            </thead>
            <tbody>
                @foreach ($topProducts as $p)
                    <tr>
                        <td>{{ $p->product->product_name }}</td>
                        <td>{{ $p->total_qty }}</td>
                        <td>$ {{ number_format($p->total_revenue, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 🔹 Low Stock Products --}}
    <div class="LME-section">
        <h2>Low Stock Products</h2>
        <table class="LME-table-mini">
            <thead>
                <tr><th>Product</th><th>Stock</th></tr>
            </thead>
            <tbody>
                @foreach ($lowStockProducts as $p)
                    <tr>
                        <td>{{ $p->product_name }}</td>
                        <td>{{ $p->product_stock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 🔹 Recent Sales --}}
    <div class="LME-section">
        <h2>Recent Sales</h2>
        <table class="LME-table-mini">
            <thead>
                <tr><th>Sale ID</th><th>Customer</th><th>Total</th><th>Date</th></tr>
            </thead>
            <tbody>
                @foreach ($recentSales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->customer->customer_email ?? 'N/A' }}</td>
                        <td>$ {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                        <td>{{ $sale->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 🔹 Customer Insights (redesigned as cards) --}}
    <div class="LME-section">
        <h2>Customer Insights</h2>
        <div class="LME-dashboard small">
            <div class="LME-card teal">
                <h3>New Customers This Month</h3>
                <div class="value">{{ $newCustomersThisMonth }}</div>
            </div>
            <div class="LME-card purple">
                <h3>Most Frequent Buyer</h3>
                <div class="value">{{ $topCustomer->customer->customer_email ?? 'N/A' }}</div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('salesTrend');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($salesTrend->pluck('day')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M d'))) !!},
            datasets: [{
                label: 'Sales ($)',
                data: {!! json_encode($salesTrend->pluck('total')) !!},
                borderColor: '#3498db',
                backgroundColor: 'rgba(52,152,219,0.2)',
                tension: 0.3,
                fill: true,
                pointBackgroundColor: '#2980b9'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    ticks: {
                        callback: value => '$ ' + value.toLocaleString()
                    }
                }
            }
        }
    });
</script>
@endsection
