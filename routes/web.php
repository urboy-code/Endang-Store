<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminLoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\EnsureProfileIsComplete;
use Illuminate\Routing\Router;

// app(Router::class)->aliasMiddleware('profileComplete', EnsureProfileIsComplete::class);

// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/detail_product', )

Route::resource('/shop', ShopController::class);
Route::resource('/cart', CartController::class);

Route::middleware(['auth', 'profileComplete'])->group(function () {
    Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');
});
// Route::get('transaction', function(){
//     return view('transaction');
// })->name('transaction');

Route::middleware('auth')->group(function () {
    Route::get('add-to-cart/{product_id}', [ShopController::class, 'addToCart'])->name('add-to-cart');
});

// Shop Controller
Route::get('qty-increment/{rowId}', [ShopController::class, 'qtyIncrement'])->name('qty-increment');
Route::get('qty-decrement/{rowId}', [ShopController::class, 'qtyDecrement'])->name('qty-decrement');
Route::get('remove-product/{rowId}', [ShopController::class, 'removeProduct'])->name('remove-product');

Route::resource('dashboard', DashboardController::class);
Route::resource('orders', OrderController::class);

Route::get('/product/trash', [ProductController::class, 'trashed'])->name('product.trash');
Route::get('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');



Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman admin yang memerlukan peran admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        // Tambahkan rute admin lainnya di sini
        Route::resource('product', ProductController::class);
    });
});

// Payment Routes
Route::post('/payment/token', [PaymentController::class, 'token']);
Route::post('/payment/notification', [PaymentController::class, 'notification']);





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
