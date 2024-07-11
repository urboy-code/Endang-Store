<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\Gateway\MidtransController;
use App\Http\Controllers\Gateway\SuccessController;
use App\Http\Controllers\Ongkir\OngkirController;
use App\Http\Controllers\Profile\AddressController;
use App\Http\Controllers\TransactionController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/detail_product', )

Route::resource('/shop', ShopController::class);
Route::resource('/cart', CartController::class);

Route::middleware(['auth'])->group(function () {
    Route::post('checkout', [MidtransController::class, 'process'])->name('checkout.process');
    Route::get('checkout/{transaction}', [MidtransController::class, 'checkout'])->name('checkout');
    Route::get('checkout/success/{transaction}', [MidtransController::class, 'success'])->name('checkout.success');
});

Route::middleware(['auth'])->group(function () {
    Route::get('add-to-cart/{product_id}', [CartController::class, 'create'])->name('add-to-cart');
    Route::get('qty-increment/{rowId}', [CartController::class, 'qtyIncrement'])->name('qty-increment');
    Route::get('qty-decrement/{rowId}', [CartController::class, 'qtyDecrement'])->name('qty-decrement');
    Route::get('remove-product/{rowId}', [CartController::class, 'destroy'])->name('remove-product');
});




// Route::resource('dashboard', DashboardController::class);


Route::get('/product/trash', [ProductController::class, 'trashed'])->name('product.trash');
Route::get('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');



Route::middleware(['auth'])->group(function () {
    // Rute untuk halaman admin yang memerlukan peran admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        // Tambahkan rute admin lainnya di sini
        Route::resource('product', ProductController::class);
        Route::resource('user', UserController::class);
        Route::resource('orders', OrderController::class);
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/profile/address', AddressController::class);
    Route::post('/profile/address/select/{id}', [AddressController::class, 'select'])->name('address.select');
    Route::delete('/profile/address/select/{id}', [AddressController::class, 'destroy'])->name('address.destroy');
});

require __DIR__ . '/auth.php';
