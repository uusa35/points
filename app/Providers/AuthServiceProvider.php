<?php

namespace App\Providers;

use App\Models\User;
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
        'App\Models\Order' => OrderPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('super', function(User $user) {
           return $user->isSuper;
        });

        Gate::define('admin', function(User $user) {
           return $user->isSuper ? $user->isSuper : $user->isAdmin;
        });

        Gate::define('designer', function(User $user) {
           return $user->isAdmin ? $user->isAdmin : $user->isDesigner;
        });

        Gate::define('client', function(User $user) {
           return $user->isAdmin ? $user->isAdmin : $user->isClient;
        });
    }
}
