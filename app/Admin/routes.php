<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('items', AdminItemController::class);
    $router->resource('customers', AdminCustomerController::class);
    $router->resource('orders', AdminOrdersController::class);
    $router->resource('reviews', AdminReviewController::class);
    $router->resource('admin-user-modellls', AdminUserContr::class);
    $router->resource('categories', AdminCatController::class);
});
