<?php

use DagaSmart\Social\Http\Controllers;
use DagaSmart\Social\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use DagaSmart\BizAdmin\Middleware\Permission;
use DagaSmart\BizAdmin\Middleware\Authenticate;


//需登录与鉴权
Route::group([
    'prefix' => '', //需要时可填
    'middleware' => [
        Middleware\Middleware::class,
    ],
], function (Router $router) {
    $router->get('social', [Controllers\SocialController::class, 'index']);

    //resource必须放最后面
    $router->resource('social', Controllers\SocialController::class);
});

//免登录无限制
//Route::get('social', [Controllers\SocialController::class, 'index'])->withoutMiddleware([Authenticate::class, Permission::class]);
