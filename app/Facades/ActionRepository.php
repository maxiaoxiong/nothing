<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ActionRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ActionRepository';
    }
}