<?php


namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ArticleRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ArticleRepository';
    }
}