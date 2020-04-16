<?php

namespace App\Providers;

use App\Models\Menu;
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
        View::composer('*', function ($view) {
            // $menus = Menu::orderBy('order', 'ASC')->get()->toTree();
            // $men = [];
            // foreach ($menus as $menu) {
            //     // echo $menu->permissions()->pluck('name')[0] == .'<br>';
            //     echo in_array($menu->permissions()->pluck('name')[0], auth()->user()->getPermissionsViaRoles()->pluck('name')->toArray()) ? $menu->name : '0 <br>';
            // }
            // // dd($men);
            // die;
            $view->with(['menus' => Menu::orderBy('order', 'ASC')->get()->toTree()]);
        });
    }
}
