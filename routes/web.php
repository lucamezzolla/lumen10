<?php

use App\Http\Controllers\LumenAuthController;

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/admin/user/list', ['middleware' => 'role:admin', 'uses' => 'UserController@list']);
    $router->post('/admin/user/create', ['middleware' => 'role:admin', 'uses' => 'UserController@createUser']);
    $router->put('/admin/user/update/{id}', ['middleware' => 'role:admin', 'uses' => 'UserController@updateUser']);
    $router->get('/admin/user/read/{id}', ['middleware' => 'role:admin', 'uses' => 'UserController@readUser']);
    $router->delete('/admin/user/delete/{id}', ['middleware' => 'role:admin', 'uses' => 'UserController@deleteUser']);  
});
    
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'LumenAuthController@login');
    $router->post('logout', 'LumenAuthController@logout');
    $router->post('refresh', 'LumenAuthController@refresh');
    $router->post('me', 'LumenAuthController@me');
});
        