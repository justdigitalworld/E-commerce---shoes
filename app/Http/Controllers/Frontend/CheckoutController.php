<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if(count($cart) == 0) {
            return redirect()->route('shop.index');
        }
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('frontend.checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'payment_method' => 'required|in:cod,card',
        ]);

        $cart = session()->get('cart', []);
        if(count($cart) == 0) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = \App\Models\Order::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(), // Nullable allowed? We'll see.
            'total_amount' => $total,
            'status' => 'pending',
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_method == 'cod' ? 'pending' : 'paid', // Simply assuming card is paid for demo
            'shipping_address' => $request->address . ', ' . $request->city . ', ' . $request->zip,
            'order_notes' => $request->notes,
        ]);

        foreach($cart as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'size' => $item['size'],
                'color' => $item['color'],
            ]);
            
            // Decrease Stock
            $product = \App\Models\Product::find($item['id']);
            if($product) {
                $product->decrement('stock', $item['quantity']);
            }
        }

        session()->forget('cart');

        return redirect()->route('home')->with('success', 'Order placed successfully! Order ID: #' . $order->id);
    }
}
