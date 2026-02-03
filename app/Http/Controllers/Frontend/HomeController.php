<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::orderBy('priority', 'desc')->latest()->take(3)->get();
        $featuredProducts = \App\Models\Product::with('category')
            ->where('is_active', true)
            ->orderBy('priority', 'desc')
            ->latest()
            ->take(8)
            ->get();
        return view('frontend.home.index', compact('categories', 'featuredProducts'));
    }
}
