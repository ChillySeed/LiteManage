<?php

namespace App\Http\Controllers;

use App\Models\sales;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\customers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $monthStart = Carbon::now()->startOfMonth();

        // 🔹 KPIs
        $totalSalesToday = sales::whereDate('date', $today)->sum('total_amount');
        $transactionsToday = sales::whereDate('date', $today)->count();
        $totalRevenueMonth = sales::whereBetween('date', [$monthStart, Carbon::now()])->sum('total_amount');
        $lowStockCount = Product::where('product_stock', '<', 10)->count(); // change threshold as needed

        // 🔹 Sales trend (last 7 days)
        $salesTrend = DB::table('sales')
            ->select(
                DB::raw('DATE(date) as day'),
                DB::raw('SUM(total_amount) as total')
            )
            ->where('date', '>=', Carbon::now()->subDays(6)) // last 7 days
            ->groupBy('day')
            ->orderBy('day')
        ->get();

        // 🔹 Top selling products
        $topProducts = SaleItem::selectRaw('product_id, SUM(quantity) as total_qty, SUM(quantity * products.product_price) as total_revenue')
            ->join('products', 'sale_items.product_id', '=', 'products.id')
            ->groupBy('product_id', 'products.product_name')
            ->orderByDesc('total_qty')
            ->take(5)
            ->get();

        // 🔹 Low stock products
        $lowStockProducts = Product::where('product_stock', '<', 10)->get();

        // 🔹 Recent sales
        $recentSales = sales::with('customer')
            ->latest()
            ->take(10)
            ->get();

        // 🔹 Customer insights
        $newCustomersThisMonth = customers::where('created_at', '>=', $monthStart)->count();
        $topCustomer = sales::selectRaw('customer_id, COUNT(*) as total_sales')
            ->groupBy('customer_id')
            ->orderByDesc('total_sales')
            ->with('customer')
            ->first();

        return view('dashboard.index', compact(
            'totalSalesToday',
            'transactionsToday',
            'totalRevenueMonth',
            'lowStockCount',
            'topProducts',
            'lowStockProducts',
            'recentSales',
            'newCustomersThisMonth',
            'topCustomer',
            'salesTrend' // 🔹 pass this to view
        ));
    }
}
