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
    $router->get('/category', ['uses'=> 'CategoryController@index']);
    $router->get('/category/{id}', ['uses'=> 'CategoryController@show']);
    $router->post('/category/{id}', ['uses'=> 'CategoryController@store']);
    $router->put('/category/{id}', ['uses'=> 'CategoryController@update']);
    $router->delete('/category/{id}', ['uses'=> 'CategoryController@destroy']);
});


