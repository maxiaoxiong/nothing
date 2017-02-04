<?php


namespace App\Http\ViewComposer;



use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use MenuRepository;

class MainComposer
{
    public function compose(View $view)
    {
        
        $route = Route::currentRouteName();
        $menus = MenuRepository::getAllDisplayMenus();

        $view->with(compact('route', 'menus'));
    }
}