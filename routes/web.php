<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['title'=>'Halaman Utama']);
});

Route::get('/shop', function () {
    return view('shop', ['title' => 'Halaman Belanja']);
});

Route::get('/cart', function () {
    return view('cart', ['title' => 'Halaman Keranjang']);
});
