<?php


namespace App\Providers;


use App\Repositories\ActionRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\MenuRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $configuration = realpath(__DIR__ . '/../../config/repository.php');
        $this->mergeConfigFrom($configuration, 'repository');
    }


    public function register()
    {
        $this->registerMenuRepository();
        $this->registerUserRepository();
        $this->registerRoleRepository();
        $this->registerActionRepository();
        $this->registerPermissionRepository();

        $this->registerArticleRepository();
        $this->registerCategoryRepository();
    }

    public function registerMenuRepository()
    {
        $this->app->singleton('MenuRepository', function ($app) {
            $model = config('repository.models.menu');
            $menu = new $model();

            return new MenuRepository($menu);
        });

        $this->app->alias('MenuRepository', MenuRepository::class);
    }

    public function registerUserRepository()
    {
        $this->app->singleton('UserRepository', function () {
            $model = config('repository.models.user');
            $user = new $model();

            return new UserRepository($user);
        });

        $this->app->alias('UserRepository', UserRepository::class);
    }

    public function registerRoleRepository()
    {
        $this->app->singleton('RoleRepository', function () {
            $model = config('repository.models.role');
            $user = new $model();

            return new RoleRepository($user);
        });

        $this->app->alias('RoleRepository', RoleRepository::class);
    }

    public function registerActionRepository()
    {
        $this->app->singleton('ActionRepository', function () {
            $model = config('repository.models.action');
            $action = new $model();

            return new ActionRepository($action);
        });

        $this->app->alias('ActionRepository', ActionRepository::class);
    }

    public function registerPermissionRepository()
    {
        $this->app->singleton('PermissionRepository', function () {
            $model = config('repository.models.permission');
            $permission = new $model();

            return new PermissionRepository($permission);
        });

        $this->app->alias('PermissionRepository', PermissionRepository::class);
    }

    public function registerArticleRepository()
    {
        $this->app->singleton('ArticleRepository', function () {
            $model = config('repository.models.article');
            $article = new $model;

            return new ArticleRepository($article);
        });

        $this->app->alias('ArticleRepository', ArticleRepository::class);
    }

    public function registerCategoryRepository()
    {
        $this->app->singleton('CategoryRepository', function () {
            $model = config('repository.models.category');
            $category = new $model();
            
            return new CategoryRepository($category);
        });

        $this->app->alias('CategoryRepository', CategoryRepository::class);
    }
}