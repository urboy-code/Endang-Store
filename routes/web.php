<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'title' => 'Halaman Utama',
        'posts' => [
            [
                'image' => url('../public/assets/images/shirt.jpg'),
                'title' => 'Black T-shirt',
                'desc' => 'Black, Original Catton 100%',
                'price' => 100000,
            ],
            [
                'image' => url('../public/assets/images/shirt.jpg'),
                'title' => 'Black T-shirt',
                'desc' => 'Black, Original Catton 100%',
                'price' => 100000,
            ],
            [
                'image' => url('../public/assets/images/shirt.jpg'),
                'title' => 'Black T-shirt',
                'desc' => 'Black, Original Catton 100%',
                'price' => 100000,
            ],
        ],

    ]);
});

Route::get('/shop', function () {
    return view('shop', ['title' => 'Halaman Belanja']);
});

Route::get('/cart', function () {
    return view('cart', ['title' => 'Halaman Keranjang']);
});

Route::resource('dashboard',DashboardController::class);

Route::resource('product', ProductController::class);
