<?php


namespace App\Repositories;


class MenuRepository extends BaseRepository
{

    const ALL_DISPLAY_MENUS_CACHE = 'all_display_menus_cache';

    public function getAllDisplayMenus()
    {
        $menus = cache(self::ALL_DISPLAY_MENUS_CACHE);

        if (empty($menus)) {
            $menus = $this->model->where('hide', '显示')->get()->toArray();
            cache([self::ALL_DISPLAY_MENUS_CACHE => $menus], 'forever');
            
            return $menus;
        }else {
            return $menus;
        }
    }
}