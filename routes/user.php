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
        $api->get('user/get-user',[
            'uses'=>'UserController@list',
        ]);
        $api->post('user/login',[
           'uses'=>'UserController@login'
        ]);
        $api->post('user/register',[
           'uses'=>'UserController@register'
        ]);
        $api->post('user/update',[
            'uses'=>'UserController@update'
        ]);
        $api->post('user/delete',[
            'uses'=>'UserController@delete'
        ]);
    });
});
