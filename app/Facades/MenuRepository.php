<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class MenuRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MenuRepository';
    }
}