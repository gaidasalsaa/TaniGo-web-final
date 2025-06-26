<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil produk berdasarkan user_id penjual yang sedang login
        $products = Product::where('user_id', Auth::id())->get();

        return view('seller.products.index', compact('products'));
    }

}
