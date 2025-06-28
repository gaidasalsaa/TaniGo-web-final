<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BuyerProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('dashboardGuest'); // bikin view ini
})->name('guest.dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard-penjual', [SellerController::class, 'index'])
    ->middleware('auth') 
    ->name('seller.dashboard');
Route::get('/register-penjual', [SellerAuthController::class, 'showRegister'])->name('register.seller');
Route::post('/register-penjual', [SellerAuthController::class, 'register']);
Route::get('/produk', [BuyerProductController::class, 'index'])->name('buyer.products.index');
Route::get('/tentangkami', function () {
    return view('tentangkami');
});
Route::get('/keranjang', function () {
    return view('keranjang');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/produk-penjual', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produk-penjual/tambah', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produk-penjual', [ProductController::class, 'store'])->name('products.store');
    Route::get('/produk-penjual/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk-penjual/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk-penjual/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/pesanan-masuk', function () {
        return view('seller.orders.index');
    })->name('orders.index')->middleware('auth');
    Route::get('/riwayat-penjualan', function () {
        return view('seller.orders.history');
    })->name('orders.history')->middleware('auth');
    Route::get('/profil-penjual', [SellerController::class, 'editProfile'])->name('seller.setting.edit');
    Route::put('/profil-penjual', [SellerController::class, 'updateProfile'])->name('seller.setting.update');
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang/tambah/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/keranjang/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/keranjang/{cart}', [CartController::class, 'destroy'])->name('cart.delete');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout.show');
    Route::post('/checkout/process', [CartController::class, 'process'])->name('checkout.process');
});
