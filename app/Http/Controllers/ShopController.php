<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::with('products')->get();
        return view('shop', compact('products', 'categories'));
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('detail', compact('product'));
    }
}
