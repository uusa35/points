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
        ],
            'App\Services\ViewComposers@getRoles');

        // backend.admin
        view()->composer([
            'backend.partials.nav',
            'welcome',
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
