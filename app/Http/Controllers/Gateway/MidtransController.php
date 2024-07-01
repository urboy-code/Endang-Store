<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    public function process(Request $request)
    {
        $data = $request->all();
        // dd($data);

        $transaction = Transaction::create([
            'user_id' => auth()->user()->id,
            'totalAmount' => $data['subtotal'],
            'status' => 'pending',
        ]);



        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $subtotal = (float) str_replace(['Rp ', ',', '.'], '', $request->subtotal);

        $params = array(
            'transaction_details' => array(
                'order_id' => uniqid(),
                'gross_amount' => $subtotal,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        // dd($transaction);
        return redirect()->route('checkout', $transaction->id);
    }

    public function checkout(Transaction $transaction)
    {
        // $transaction = Transaction::findOrFail($transaction);
        $transactionId = $transaction->id;
        // dd($transactionId);
        $subtotal = $transaction->totalAmount;
        // dd($totalAmount);
        $tax = 0.1;

        $taxAmount = $subtotal * $tax;
        $total = $taxAmount + $subtotal;

        return view('checkout.checkout', compact('subtotal', 'tax', 'total', 'transaction'));
    }

    public function success(Transaction $transaction)
    {
        $userCart = Cart::where('user_id', Auth::user()->id)->first();
        if ($userCart) {
            $userCart->update(['cart_data' => []]);
        }

        $transaction->status = 'success';
        $transaction->save();

        return redirect()->route('home')->with('success', 'Pembayaran berhasil. Keranjang sudah dikosongkan.');
    }
}
