<?php


namespace app\Providers;


use Illuminate\Support\ServiceProvider;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    private $main;

    public function __construct()
    {
        $this->main = [
            'layouts.partials.sidebar'
        ];
    }

    public function boot()
    {
        view()->composer($this->main, 'App\Http\ViewComposer\MainComposer');
    }

    public function register()
    {
        
    }
}