<?php

namespace App\Providers;

use App\Models\Order;
use App\Policies\OrderPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
//        'order '=> OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('order', OrderPolicy::class);

        Gate::define('isAdmin', function () {
            return auth()->user()->isAdminOrAbove; // means if isSupern then go ahead
        });

        Gate::define('onlySuper', function () {
            return auth()->user()->role->is_super;
        });

        Gate::define('onlyAdmin', function () {
            return auth()->user()->role->is_admin;
        });

        Gate::define('onlyClient', function () {
            return auth()->user()->role->is_client;
        });

        Gate::define('onlyDesigner', function () {
            return auth()->user()->role->is_designer;
        });

    }
}
