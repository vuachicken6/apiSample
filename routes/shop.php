<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */
// $app->get('/', function () use ($app) {
//     return $app->version();
// });

$api = app('Dingo\Api\Routing\Router');
use App\Http\Middleware\DemoMiddleware;
// v1 version API
$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {
    $api->group(['middleware' => ['api.locale']], function ($api) {
        $api->get('shop/view-list', [
            'as' => 'shop.viewList',
            'uses' => 'ShopController@viewList',
        ]);
        $api->get('shop/detail', [
            'as' => 'shop.detail',
            'uses' => 'ShopController@detail',
        ]);
        $api->get('shop/get-shop',[
           'uses'=>'ShopController@list'
        ]);
        $api->post('shop/register', [
            'as' => 'shop.register',
            'uses' => 'ShopController@create',
        ]);
        $api->post('shop/update', [
            'as' => 'shop.update',
            'uses' => 'ShopController@update',
        ]);
        $api->post('shop/delete', [
            'as' => 'shop.delete',
            'uses' => 'ShopController@delete',
        ]);
    });
});
