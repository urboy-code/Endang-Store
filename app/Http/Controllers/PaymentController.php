<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Notification;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function token(Request $request)
    {
        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->amount(),
            ],
            'customer_details' => [
                'first_name' => $request->first_name(),
                'last_name' => $request->last_name(),
                'email' => $request->email(),
                'phone' => $request->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return response()->json(['token' => $snapToken]);
    }

    public function notification(Request $request)
    {
        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set transaction status on your database to 'challenge'
                } else {
                    // TODO set transaction status on your database to 'success'
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set transaction status on your database to 'success'
        } else if ($transaction == 'pending') {
            // TODO set transaction status on your database to 'pending'
        } else if ($transaction == 'deny') {
            // TODO set transaction status on your database to 'deny'
        } else if ($transaction == 'expire') {
            // TODO set transaction status on your database to 'expire'
        } else if ($transaction == 'cancel') {
            // TODO set transaction status on your database to 'cancel'
        }
    }
}
