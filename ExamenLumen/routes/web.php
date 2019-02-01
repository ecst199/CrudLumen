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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['middleware' => []], function () use ($router) {
    $router->get('/get', ['uses' => 'PersonaController@get']);
    $router->post('/post', ['uses' => 'PersonaController@post']);
    $router->put('/put', ['uses' => 'PersonaController@put']);
    $router->get('/we', ['uses' => 'PersonaController@sp']);

    ////////////////////////////////////////////////////////////////
    $router->get('/get1', ['uses' => 'UsuarioController@get']);
    $router->post('/post1', ['uses' => 'UsuarioController@post']);
    $router->delete('/delete1', ['uses' => 'UsuarioController@delete']);
    $router->put('/put1', ['uses' => 'UsuarioController@put']);
    $router->get('/we1', ['uses' => 'UsuarioController@sp']);

    $router->get('/doble', ['uses' => 'ProductoController@post']);
    $router->get('/genero', ['uses' => 'ProductoController@get']);
    $router->get('/traer', ['uses' => 'ProductoController@traer']);
    $router->get('/inse', ['uses' => 'ProductoController@ins']);
    $router->get('/ins', ['uses' => 'ProductoController@inse']);

});