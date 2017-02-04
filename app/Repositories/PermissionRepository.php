<?php


namespace App\Repositories;


use App\Models\Action;
use App\Models\Menu;

class PermissionRepository extends BaseRepository
{
    public function getAllMenusByPermission($permission)
    {
        $data = [];
        $permissionHasMenuIds = $permission->menus->pluck('id')->toArray();
        $menus = Menu::all()->toArray();

        foreach ($menus as $key => $menu) {
            $data[$key]['id'] = $menu['id'];
            $data[$key]['pId'] = $menu['parent_id'];
            $data[$key]['name'] = $menu['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($menu['id'], $permissionHasMenuIds)) {
                $data[$key]['checked'] = true;
            }
        }
        
        return $data;
        
    }

    public function getAllActionsByPermission($permission)
    {
        $data = [];
        $permissionHasActionIds = $permission->actions->pluck('id')->toArray();
        $actions = Action::all()->toArray();

        foreach ($actions as $key => $action) {
            $data[$key]['id'] = $action['id'];
            $data[$key]['pId'] = $action['group'];
            $data[$key]['name'] = $action['name'];
            $data[$key]['open'] = true;
            $data[$key]['value'] = 1;
            if (in_array($action['id'], $permissionHasActionIds)) {
                $data[$key]['checked'] = true;
            }
        }

        foreach (config('self.action-group') as $key => $value) {
            $group['id'] = $key;
            $group['pId'] = 0;
            $group['name'] = $value;
            $group['open'] = true;
            $group['value'] = 1;
            array_push($data, $group);
        }

        return $data;
    }


}