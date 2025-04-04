<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use FastRoute\Route;

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

// $router->get('/', function () use ($router) {
//     ini_set('memory_limit', '-1');

//     $test = App\Models\Test::all();
//     return response()->json($test);
// });
$router->get('/', 'TestController@index');

$router->group(['prefix' => 'api/mcmc'], function () use ($router) {

    // $router->get('/test', ['uses' => 'TestController@index']);
    $router->post('/GetIMEI', 'TestController@imei');
    $router->post('/GetSerialNo', 'TestController@serial');
    $router->post('/GetSLP', 'TestController@slp');
    $router->post('/GetTAC', 'TestController@tac');

    $router->post('/filter', 'TestController@filter');

});
