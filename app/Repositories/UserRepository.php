<?php


namespace App\Repositories;

use Cache;

class UserRepository extends BaseRepository
{
    const USER_MENU_PERMISSION_CACHE = 'user_menu_permission_cache';

    const USER_ACTION_PERMISSION_CACHE = 'user_action_permission_cache';

    public function getUserMenusPermissionByUserModel($user)
    {
        $routes = cache(self::USER_MENU_PERMISSION_CACHE . $user->id);

        if (empty( $routes )) {

            $roles = $user->roles;

            $permissions = [ ];
            foreach ($roles as $key => $role) {
                $permissions[] = $role->perms;
            }

            $menus = [ ];
            foreach ($permissions as $permission) {
                foreach ($permission as $item) {
                    if ($item[ 'type' ] != 'menu') {
                        continue;
                    }
                    $menus[] = $item->menus->toArray();
                }
            }

            foreach ($menus as $menu) {
                foreach ($menu as $value) {
                    $routes[] = $value[ 'route' ];
                }
            }

            if ($routes) {
                $routes = array_unique($routes);
            }

            Cache::forever(self::USER_MENU_PERMISSION_CACHE . $user->id, $routes);
        }

        return $routes;
    }

    public function getUserActionPermissionsByUserModel($user)
    {
        $routes = cache(self::USER_ACTION_PERMISSION_CACHE . $user->id);

        if (empty( $routes )) {

            $roles = $user->roles;

            $permissions = [ ];
            foreach ($roles as $role) {
                $permissions[] = $role->perms;
            }

            $actions = [ ];
            foreach ($permissions as $permission) {
                foreach ($permission as $item) {
                    if ($item[ 'type' ] != 'action')
                        continue;
                    $actions[] = $item->actions->toArray();
                }
            }

            $routes = [ ];
            foreach ($actions as $action) {
                foreach ($action as $item) {
                    $routes[] = $item[ 'action' ];
                }
            }

            if ($routes) {
                array_unique($routes);
            }

            Cache::forever(self::USER_ACTION_PERMISSION_CACHE . $user->id, $routes);
        }
        return $routes;
    }
}