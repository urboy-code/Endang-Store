<?php

namespace App\Http\Controllers\Gateway;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
    public function thankyou($transactionId){
        dd(Transaction::all());
    }
}
