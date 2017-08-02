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

$app->get('/', 'Controller@index');

$app->get('/page/{page}', 'PageController@index');

$app->get('/api/{name}/{action}', 'ApiController@slug');
$app->post('/api/{name}/{action}', 'ApiController@slug');
