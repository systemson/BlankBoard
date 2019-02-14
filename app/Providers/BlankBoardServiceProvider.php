<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BlankBoardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Render menus
        Blade::directive('menu', function ($menu = null) {
            return "<?php echo menu({$menu}); ?>";
        });

        // Render column celss
        Blade::directive('td', function () {
            return '<?php echo td($resource, $column); ?>';
        });

        // Render column header cells
        Blade::directive('th', function () {
            return '<?php echo th($column, __($module->slug . \'.table.\' . $column)); ?>';
        });

        // Permission custom if
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
