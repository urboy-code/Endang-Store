<?php

namespace App\Providers;


use App\Http\Middleware\CheckRole;
use App\Http\Middleware\EnsureProfileIsComplete;
use Carbon\Carbon;
use illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::aliasMiddleware('role', CheckRole::class);
        Route::aliasMiddleware('profileComplete', EnsureProfileIsComplete::class);
        Carbon::setLocale(config('app.timezone'));
    }
}
