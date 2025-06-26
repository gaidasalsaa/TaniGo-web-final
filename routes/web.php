<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerAuthController;
use App\Http\Controllers\ProductController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/proseslogin', [AuthController::class, 'proseslogin'])->name('proseslogin');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard-penjual', [SellerController::class, 'index'])->name('seller.dashboard');
Route::get('/register-penjual', [SellerAuthController::class, 'showRegister'])->name('register.seller');
Route::post('/register-penjual', [SellerAuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/produk-penjual', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produk-penjual/tambah', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produk-penjual', [ProductController::class, 'store'])->name('products.store');
    Route::get('/produk-penjual/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk-penjual/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk-penjual/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->name('products.update');
});
