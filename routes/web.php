<?php

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
$router->post('api/login', ['uses'=> 'LoginController@login']);
$router->post('api/register', ['uses'=> 'LoginController@register']);

$router->group(['prefix' => 'api','middleware' => 'auth'], function () use ($router) {
    // Category Routes
    $router->get('/category', ['uses'=> 'CategoryController@index']);
    $router->get('/category/{id}', ['uses'=> 'CategoryController@show']);
    $router->post('/category', ['uses'=> 'CategoryController@store']);
    $router->put('/category/{id}', ['uses'=> 'CategoryController@update']);
    $router->delete('/category/{id}', ['uses'=> 'CategoryController@destroy']);

    // customer Routes
    $router->get('/customer', ['uses'=> 'CustomerController@index']);
    $router->get('/customer/{id}', ['uses'=> 'CustomerController@show']);
    $router->post('/customer', ['uses'=> 'CustomerController@store']);
    $router->put('/customer/{id}', ['uses'=> 'CustomerController@update']);
    $router->delete('/customer/{id}', ['uses'=> 'CustomerController@destroy']);

    // Menus Routes
    $router->get('/menu', ['uses'=> 'MenuController@index']);
    $router->get('/menu/{id}', ['uses'=> 'MenuController@show']);
    $router->post('/menu', ['uses'=> 'MenuController@store']);
    $router->put('/menu/{id}', ['uses'=> 'MenuController@update']);
    $router->delete('/menu/{id}', ['uses'=> 'MenuController@destroy']);

    // Logout
    $router->get('/logout', ['uses'=> 'LoginController@logout']);
});
