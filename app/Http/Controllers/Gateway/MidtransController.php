<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Courier;
use App\Models\Transaction;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

        $total = (float) str_replace(['Rp ', ',', '.'], '', $request->total);

        $params = array(
            'transaction_details' => array(
                'order_id' => uniqid(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        // session(['ongkir' => $ongkir]);
        return redirect()->route('checkout', $transaction->id);
    }

    public function checkout(Transaction $transaction)
    {
        $user = Auth::user();

        if ($user->addresses->isEmpty()) {
            return redirect()->route('address.index')->with('error', 'Tambahkan alamat terlebih dahulu sebelum melakukan Checkout!');
        }

        $selectedAddress = $user->addresses()->where('is_selected', 1)->first();
        if (!$selectedAddress) {
            return redirect()->route('address.index')->with('error', 'Tolong pilih alamat anda');
        }
        // $transaction = Transaction::findOrFail($transaction);
        $transactionId = $transaction->id;
        // dd($transactionId);
        $subtotal = $transaction->totalAmount;
        // dd($totalAmount);
        $tax = 0.1;

        $taxAmount = $subtotal * $tax;
        $total = $taxAmount + $subtotal;

        return view('checkout.checkout', compact('subtotal', 'tax', 'total', 'transaction', 'selectedAddress'));
    }

    public function success(Transaction $transaction)
    {
        FacadesCart::destroy();
        $transaction->status = 'success';
        $transaction->save();

        return redirect()->route('home')->with('success', 'Pembayaran berhasil. Keranjang sudah dikosongkan.');
    }
}
