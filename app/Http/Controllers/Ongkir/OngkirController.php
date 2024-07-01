<?php

namespace App\Http\Controllers\Ongkir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'key' => '1f78e5921ca72104fbb74fae37d5acd0'
        ])->get('https://api.rajaongkir.com/starter/city');

        dd($response->json());
    }
}
