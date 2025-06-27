<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function show(Request $request)
    {
        $cartIds = explode(',', $request->cart_ids); // Ambil ID cart dari input hidden

        $carts = Cart::with('product')->whereIn('id', $cartIds)->get();

        $total = $carts->sum(function ($cart) {
            return $cart->product->harga * $cart->quantity;
        });

        return view('checkout', compact('carts', 'total'));
    }
}

