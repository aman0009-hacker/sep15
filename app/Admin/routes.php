<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\AddProductsController;
use App\Admin\Controllers\YardMgmtController;
use App\Admin\Controllers\ProductController;

Admin::routes();
Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('auth/user', UserController::class);
    $router->resource('auth/documents', DocumentsController::class);
    $router->resource('attachments', AttachmentController::class);
    $router->get('custom-page', 'CustomPageController@index');
    $router->get('get-cities', 'CustomPageController@getCities');
    $router->resource('auth/yards', YardController::class);
    $router->get('/YardManagement', [YardMgmtController::class, 'index']);
    $router->get('load-categories', [YardMgmtController::class, 'loadCategories']);
    $router->get('load-entities', [YardMgmtController::class, 'loadEntities']);
    $router->get('Product', [AddProductsController::class, 'index']);
    $router->post('save-data', [AddProductsController::class, 'saveData']);
    $router->resource('products', ProductController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('entities', EntityController::class);
    $router->resource('orders', OrderController::class);
    $router->resource('records', YardSupervisorManagementController::class);
    $router->resource('admin-common-value-changes', AdminCommonValue::class);

    // $router->resource('admin-users', UserRoleController::class);
    $router->resource('admin-users', authController::class);


});