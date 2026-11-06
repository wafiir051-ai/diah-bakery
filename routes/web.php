<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController; // Tambahkan ini jika belum ada
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

// ==============================================
// HALAMAN UTAMA (HOME)
// ==============================================
Route::get('/', function () {
    return view('diah_bakery');
})->name('home');

// ==============================================
// HALAMAN ABOUT
// ==============================================
Route::get('/about', function () {
    return view('about_bakery');
})->name('about');

// ==============================================
// HALAMAN FAQ (FREQUENTLY ASKED QUESTIONS)
// ==============================================
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// ==============================================
// HALAMAN PRODUK (PUBLIC)
// ==============================================
Route::get('/faq', function () {
    return view('faq');
})->name('faq');

// ==============================================
// HALAMAN PRODUK (PUBLIC)
// ==============================================
Route::get('/products', [ProductController::class, 'index'])->name('products');

// ==============================================
// HALAMAN SOCIAL (PUBLIC)
// ==============================================
Route::get('/social', function () {
    return view('social');
})->name('social');

// ==============================================
// KERANJANG
// ==============================================
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// ==============================================
// CHECKOUT
// ==============================================
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// ==============================================
// LOGIN ADMIN
// ==============================================
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ==============================================
// DASHBOARD ADMIN (Harus Login)
// ==============================================
Route::middleware(['auth'])->group(function () {
   // Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // route lainnya...
// });
    

    
    // Manajemen Pesanan (Order)
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::post('/admin/orders/{id}/complete', [OrderController::class, 'complete'])->name('admin.orders.complete');
    Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
    
    // ==============================================
    // BARIS NO 5 - ROUTE COMPLETE ORDER VIA PUT (untuk dashboard)
    // ==============================================
   Route::get('/admin/order/{id}/send-wa', [AdminController::class, 'sendWA'])->name('admin.order.sendWa');
    
    // CRUD Produk
    Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
});