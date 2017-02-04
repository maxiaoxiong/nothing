<?php

namespace App\Http\Middleware;

use Closure;
use Auth, Route, URL;
use UserRepository;

class Authorize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$user = Auth::user()) {
            return redirect()->to('/auth/logout');
        }

        if ($user->is_super_admin) {
            return $next($request);
        }

        $route = Route::current()->getName();
        $action = Route::current()->getActionName();
        $previousUrl = URL::previous();

//        $menus = UserRepository::getUserMenusPermissionByUserModel($user);
//
//        if (!$menus) {
//            return redirect()->route('403');
//        }
//
//        if (! in_array($route, $menus)) {
//            return redirect()->route('403');
//        }

        $actions = UserRepository::getUserActionPermissionsByUserModel($user);

        if (!$actions) {
            return redirect()->route('403');
        }

        if (!in_array($action, $actions)) {

            return redirect()->route('403');
        }

        return $next($request);
    }
}
