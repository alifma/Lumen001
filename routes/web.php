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

$router->group(['prefix' => 'api'], function () use ($router) {
    // Category Routes
    $router->get('/category', ['uses'=> 'CategoryController@index']);
    $router->get('/category/{id}', ['uses'=> 'CategoryController@show']);
    $router->post('/category/', ['uses'=> 'CategoryController@store']);
    $router->put('/category/{id}', ['uses'=> 'CategoryController@update']);
    $router->delete('/category/{id}', ['uses'=> 'CategoryController@destroy']);

    // customer Routes
    $router->get('/customer', ['uses'=> 'CustomerController@index']);
    $router->get('/customer/{id}', ['uses'=> 'CustomerController@show']);
    $router->post('/customer/', ['uses'=> 'CustomerController@store']);
    $router->put('/customer/{id}', ['uses'=> 'CustomerController@update']);
    $router->delete('/customer/{id}', ['uses'=> 'CustomerController@destroy']);
});
