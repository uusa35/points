<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // backend
        view()->composer([
            'backend.partials.sidebar.sidebar',
            'backend.modules.user.create',
            'backend.modules.user.edit',
            'auth.register',
        ],
            'App\Services\ViewComposers@getRoles');
        
        view()->composer([
            'backend.layouts.app',
            'welcome',
            'auth.login',
            'auth.register',
            'auth.verify',
            'auth.passwords.backend_reset',
            'auth.passwords.email',
        ],
            'App\Services\ViewComposers@getSettings');

    }

    /**
     * automatically composer() method will be registered
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
