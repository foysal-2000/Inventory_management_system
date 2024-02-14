<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function create()
    {
        return view('backend.admin.create_role');
    }
    

        public function show()
        {
           return view('backend.profile');
        }



}
