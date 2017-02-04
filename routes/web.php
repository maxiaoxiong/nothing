<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::loginUsingId(1);
Route::get('/', function () {
    return redirect()->route('blog');
});
Route::get('403', function () {
    return view('errors.403');
})->name('403');
Route::get('test', function () {
    return cache('user_action_permission_cache1');
});

// 前端路由
Route::group([ 'namespace' => 'Page' ], function () {

    Route::get('/blog', 'PageController@blog')->name('blog');

    Route::get('/contact', 'PageController@contact')->name('contact');

    Route::get('/about', 'PageController@about')->name('about');

    Route::get('/article/{id}', 'ArticleController@show')->name('article');

    Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');

    Route::group(['prefix' => 'blog/article'], function (){
        Route::get('{id}/show', 'ArticleController@show')->name('blog.article.show');
    });
});

// 后台路由

Route::auth();

Route::group([ 'namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => ['auth','authorize'] ], function () {

    Route::get('/home', 'HomeController@index')->name("admin.home");

    Route::group([ 'prefix' => 'setting', 'middleware' => [ 'role:super-admin' ] ], function () {

        Route::group([ 'prefix' => 'menu' ], function () {
            Route::get('index', 'MenuController@index')->name('admin.setting.menu.index');
            Route::post('store', 'MenuController@store')->name('admin.setting.menu.store');
            Route::get('create', 'MenuController@create')->name('admin.setting.menu.create');
            Route::get('{id}/edit', 'MenuController@edit')->name('admin.setting.menu.edit');
            Route::post('{id}/update', 'MenuController@update')->name('admin.setting.menu.update');
            Route::get('{id}/delete', 'MenuController@destroy')->name('admin.setting.menu.delete');
        });


        Route::group([ 'prefix' => 'action' ], function () {
            Route::get('index', 'ActionController@index')->name('admin.setting.action.index');
            Route::post('store', 'ActionController@store')->name('admin.setting.action.store');
            Route::get('create', 'ActionController@create')->name('admin.setting.action.create');
            Route::get('{id}/edit', 'ActionController@edit')->name('admin.setting.action.edit');
            Route::post('{id}/update', 'ActionController@update')->name('admin.setting.action.update');
            Route::get('{id}/delete', 'ActionController@destroy')->name('admin.setting.action.delete');
        });

        Route::group([ 'prefix' => 'role' ], function () {
            Route::get('index', 'RoleController@index')->name('admin.setting.role.index');
            Route::get('create', 'RoleController@create')->name('admin.setting.role.create');
            Route::post('store', 'RoleController@store')->name('admin.setting.role.store');
            Route::post('associatePermission', 'RoleController@associatePermission')->name('admin.setting.role.associatePermission');
            Route::get('{id}/getRoleHasPermission', 'RoleController@getRoleHasPermission')->name('admin.setting.role.getRoleHasPermission');
        });

        Route::group([ 'prefix' => 'permission' ], function () {
            Route::get('index', 'PermissionController@index')->name('admin.setting.permission.index');
            Route::get('create', 'PermissionController@create')->name('admin.setting.permission.create');
            Route::post('store', 'PermissionController@store')->name('admin.setting.permission.store');
            Route::get('{id}/edit', 'PermissionController@edit')->name('admin.setting.permission.edit');
            Route::post('{id}/update', 'PermissionController@update')->name('admin.setting.permission.update');
            Route::get('{id}/delete', 'PermissionController@delete')->name('admin.setting.permission.delete');
            Route::get('{id}/associate', 'PermissionController@associate')->name('admin.setting.permission.associate');
            Route::get('associateMenus', 'PermissionController@associateMenus')->name('admin.setting.permission.associate.menus');
            Route::get('associateActions', 'PermissionController@associateActions')->name('admin.setting.permission.associate.actions');
        });

        Route::group([ 'prefix' => 'user' ], function () {
            Route::get('index', 'UserController@index')->name('admin.setting.user.index');
            Route::get('create', 'UserController@create')->name('admin.setting.user.create');
            Route::post('store', 'UserController@store')->name('admin.setting.user.store');
            Route::get('{id}/edit', 'UserController@edit')->name('admin.setting.user.edit');
            Route::post('{id}/update', 'UserController@update')->name('admin.setting.user.update');
            Route::get('{id}/delete', 'UserController@destroy')->name('admin.setting.user.delete');
            Route::get('associateRole', 'UserController@associateRole')->name('admin.setting.user.associateRole');
        });

        Route::group([ 'prefix' => 'log' ], function () {
            Route::get('index', 'LogController@index')->name('admin.setting.log.index');
        });
    });

    Route::group([ 'prefix' => 'site' ], function () {
        Route::group([ 'prefix' => 'article' ], function () {
            Route::get('index', 'ArticleController@index')->name('admin.site.article.index');
            Route::get('create', 'ArticleController@create')->name('admin.site.article.create');
            Route::post('store', 'ArticleController@store')->name('admin.site.article.store');
            Route::get('{id}/edit', 'ArticleController@edit')->name('admin.site.article.edit');
            Route::post('{id}/update', 'ArticleController@update')->name('admin.site.article.update');
            Route::get('{id}/show', 'ArticleController@show')->name('admin.site.article.show');
        });

        Route::group([ 'prefix' => 'comment' ], function () {
            Route::get('index', 'CommentController@index')->name('admin.site.comment.index');
        });

        Route::group([ 'prefix' => 'category' ], function () {
            Route::get('index', 'CategoryController@index')->name('admin.site.category.index');
            Route::get('create', 'CategoryController@create')->name('admin.site.category.create');
            Route::post('store', 'CategoryController@store')->name('admin.site.category.store');
            Route::get('{id}/edit', 'CategoryController@edit')->name('admin.site.category.edit');
            Route::post('{id}/update', 'CategoryController@update')->name('admin.site.category.update');
        });

        Route::group([ 'prefix' => 'visitor' ], function () {
            Route::get('index', 'VisitorController@index')->name('admin.site.visitor.index');
        });
    });

    Route::get('upload/getToken', 'UploadController@getUploadToken')->name('admin.upload.getUploadToken');
    Route::get('upload/getCallback', 'UploadController@getCallback')->name('admin.upload.getCallback');
    Route::post('upload', 'UploadController@upload')->name('admin.upload');

});
