<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('permission', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->hasPermission({$permission})) : ?>";
        });

        Blade::directive('endpermission', function ($permission) {
            return "<?php endif; ?>";
        });
    }
}
