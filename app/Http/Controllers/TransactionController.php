<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class TransactionController extends Controller
{


    public function index()
    {
        $products = Cart::content();
        $subtotal = 0;
        $tax = 0.1;

        foreach ($products as $product){
            $subtotal += $product->price;
        }
        $taxAmount = $subtotal*$tax;
        $total = $subtotal + $taxAmount;

        return view('transaction', compact('tax', 'total', 'subtotal'));
    }
}
