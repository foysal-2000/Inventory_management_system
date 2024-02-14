<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function create()
    {
        $invoiceData = Inventory::all();
        $total_sales = Inventory::count();
        return view('backend.sales.create', compact('total_sales','invoiceData'));

    }

    public function getProductCounts()
    {
        $todayCount = Inventory::whereDate('created_at', today())->count();
        $weekCount = Inventory::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $monthCount = Inventory::whereMonth('created_at', now()->month)->count();

        return response()->json([
            'today' => $todayCount,
            'week' => $weekCount,
            'month' => $monthCount,
        ]);
    }
    

}