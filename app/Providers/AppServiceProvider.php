<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFour();

        $menus = Menu::query()
            ->where(['parent_id' => null])
            ->whereNotIn('header_footer', ['2'])
            ->select('id', 'name', 'parent_id', 'external_link', 'category_slug', 'position', 'publish_status', 'title_slug')
            ->with('children:id,name,parent_id,external_link,category_slug,title_slug')
            ->orderBy('position', 'ASC')
            ->get();

        View::share('menus', $menus);



        $fmenus = Menu::where(['parent_id' => null])->whereNotIn('header_footer', ['1'])
            ->select('id', 'name', 'parent_id', 'external_link', 'category_slug', 'publish_status', 'position', 'title_slug')
            ->orderBy('position', 'ASC')
            ->get();

        View::share('fmenus', $fmenus);

    }
}
