<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if($role == '1')
        {
            return view('admin.dashboard-admin');
        }
        else
        {
            return view('dashboard');
        }
    }
}
