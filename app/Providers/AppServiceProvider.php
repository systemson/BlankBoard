<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Carbon localization
        Carbon::setLocale(config('app.locale'));

        // Render menus
        Blade::directive('menu', function () {
            return "<?php echo menu(); ?>";
        });   

        // Render menus
        Blade::if('permission', function ($permissions, $module = false) {
            return auth()->user()->hasPermission($permissions, $module);
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
