<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('frontend.cart.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $product = \App\Models\Product::with('images')->findOrFail($request->product_id);
        $cart = session()->get('cart', []);
        
        $key = $product->id . '-' . $request->size . '-' . $request->color;

        if(isset($cart[$key])) {
            $cart[$key]['quantity']++;
        } else {
            $cart[$key] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->images->first() ? $product->images->first()->image_path : null,
                'quantity' => 1,
                'size' => $request->size,
                'color' => $request->color,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, $key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])) {
            $cart[$key]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }

    public function destroy($key)
    {
        $cart = session()->get('cart', []);
        if(isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed successfully');
    }
}
