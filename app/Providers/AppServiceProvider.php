<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!class_exists('\Blade')) return;

        // Call to Entrust::hasRole
        \Blade::directive('role', function($role) {
            return "<?php if (App\Models\User::has_role(null,$role)) : ?>";
        });

        \Blade::directive('endrole', function($role) {
            return "<?php endif; ?>";
        });

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
