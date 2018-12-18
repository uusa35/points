<?php

namespace App\Providers;

use App\Models\Balance;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use App\Observers\BalanceObserver;
use App\Observers\OrderObserver;
use App\Observers\TransactionObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (app()->environment('production')) {
            Order::observe(OrderObserver::class);
            Balance::observe(BalanceObserver::class);
            User::observe(UserObserver::class);

        } elseif(app()->environment('local')) {
            Transaction::observe(TransactionObserver::class);
        }
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
