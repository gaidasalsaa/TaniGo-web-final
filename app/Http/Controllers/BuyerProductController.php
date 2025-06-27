<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class BuyerProductController extends Controller
{
    

    public function index()
    
    {
        $products = Product::latest()->get();
        return view('buyer.products.index', compact('products'));
    }
}
