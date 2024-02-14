<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    
    public function index()
    {
        $this->authorize('dashboard');
        return view('backend.admin');
    }
    public function cashier()
    {
        $this->authorize('dashboard');
        return view('backend.cashier');
    }
}
