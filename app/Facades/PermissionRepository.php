<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class PermissionRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PermissionRepository';
    }
}