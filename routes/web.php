<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::resource('shop', \App\Http\Controllers\Frontend\ShopController::class)->only(['index', 'show']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Cart Routes (Now protected)
    Route::resource('cart', \App\Http\Controllers\Frontend\CartController::class)->only(['index', 'store', 'destroy']);
    Route::patch('cart/{id}', [\App\Http\Controllers\Frontend\CartController::class, 'update'])->name('cart.update');
    
    // Checkout Routes (Now protected)
    Route::get('checkout', [\App\Http\Controllers\Frontend\CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('checkout', [\App\Http\Controllers\Frontend\CheckoutController::class, 'store'])->name('checkout.store');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    $orders = \App\Models\Order::where('user_id', \Illuminate\Support\Facades\Auth::id())->latest()->get();
    return view('dashboard', compact('orders'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show', 'update']);
    Route::get('/users', [\App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users.index');
});

require __DIR__.'/auth.php';
