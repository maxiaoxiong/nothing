<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [ 'name', 'type', 'display_name', 'description' ];

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu');
    }

    public function actions()
    {
        return $this->belongsToMany('App\Models\Action');
    }
}