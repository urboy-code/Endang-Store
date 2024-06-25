<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    public function index()
    {
        $products = Session::get('cart', []);

        Log::info('Cart Data: ', $products);

        $subTotal = 0;

        foreach ($products as $product) {
            $subTotal += $product['qty'] * $product['price'];
        }

        $totalAmount = $subTotal;
        return view('transaction', compact('totalAmount'));
    }


}
