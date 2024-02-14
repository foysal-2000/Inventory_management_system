<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Profit;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Inventory;

class DashboardController extends Controller
{
    public function create()
    {
        $customers = Customer::count();
        $total_sales = Inventory::count();
        $products =Product::count();
        $datas = Inventory::all();

        $user = User::count();
        $dss = Product::all();
        $profits = Profit::all();

        $suppiers = Supplier::count();
        return view('backend.dashboard.create',compact('total_sales','products','customers','datas','user','dss','profits','suppiers'));
    }

    public function edit()
    {
        $customers = Customer::count();
        $total_sales = Inventory::count();
        $products =Product::count();
        $inventories = Inventory::all();

        $user = User::count();
        $products = Product::all();
        $profits = Profit::all();
        return view ('backend.dashboard.edit',compact('total_sales','products','customers','inventories','user','profits'));
    }
    
}
