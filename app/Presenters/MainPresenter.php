<?php


namespace App\Presenters;


use Auth;
use UserRepository;

class MainPresenter
{

    public function renderSidebar(array $menus, $route)
    {
        /*
         * 根据已登录的用户的权限获取相应的菜单列表
         */
        $user = Auth::user();

        if (!$user) {
            redirect()->to('/auth/logout');
        }


        $routes = UserRepository::getUserMenusPermissionByUserModel($user);

        if (empty( $routes )) {
            return '';
        }

        foreach ($menus as $key => $menu) {
            if (!in_array($menu[ 'route' ], $routes)) {
                unset( $menus[ $key ] );
            }
        }

        $trees = create_node_tree($menus);
        $sidebar = '<ul class="sidebar-menu">';
        $sidebar .= self::createSidebar($trees, $route);
        $sidebar .= '</ul>';

        return $sidebar;
    }

    public function createSidebar($menus, $route)
    {
        $sidebar = '';

        foreach ($menus as $menu) {
            if ($menu[ 'child' ]) {
                $active = str_contains($route, $menu[ 'route' ]) ? 'active' : '';
                $sidebar .= '<li class="treeview ' . $active . '"><a href="javascript:void(0)"><span class="' . $menu[ 'icon' ] . '"></span>
                  ' . $menu[ 'name' ] . '<i class="fa fa-angle-left pull-right"></i></a>';
                $sidebar .= '<ul class="treeview-menu">' . self::createSidebar($menu[ 'child' ], $route) . '</ul>';
                $sidebar .= '</li>';
            } else {
                $active = $menu[ 'route' ] == $route ? 'active' : '';
                $sidebar .= '<li class=' . $active . '><a href="' . route($menu[ 'route' ]) . '"><span class="' . $menu[ 'icon' ] . '"></span>  ' . $menu[ 'name' ] . '</a></li>';
            }
        }

        return $sidebar;
    }
}