<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use App\Models\Menu;

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
            $items = Menu::where('status', 1)->get();

            if (empty($items)) return;

            $list = null;

            $open = '<ul class="navbar-nav">';
            foreach ($items as $item) {
                $url = url($item->url);
                $list .= "<li class=\"nav-item <?php echo requestIs('{$item->url}'); ?>\"><a class=\"nav-link\" href=\"{$url}\">{$item->title}</a></li>";
            }
            $close = '</ul>';

            return $open.$list.$close;
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
