<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = \App\Models\User::where('role', 'customer')->count();
        $totalProducts = \App\Models\Product::count();
        $totalOrders = \App\Models\Order::count();
        
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders'));
    }
    public function users()
    {
        $users = \App\Models\User::where('role', 'customer')->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }
}
