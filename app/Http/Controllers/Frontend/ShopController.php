<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $query = \App\Models\Product::where('is_active', true);

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand);
            });
        }

        $products = $query->orderBy('priority', 'desc')->latest()->paginate(12);
        $categories = \App\Models\Category::all();
        $brands = \App\Models\Brand::all();

        return view('frontend.shop.index', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $product = \App\Models\Product::with(['images', 'category', 'brand'])->findOrFail($id);
        $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
            
        return view('frontend.shop.show', compact('product', 'relatedProducts'));
    }
}
