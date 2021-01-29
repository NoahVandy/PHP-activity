<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello World";
});

Route::get('/helloworld', function () {
    return view('HelloWorld');
});

Route::get('/test', 'TestController@test');

Route::get('/test2', 'TestController@test2');

Route::post('/dologin5', 'Login5Controller@index');

Route::get('/askme', function () {
    return view('WhoAmI');
});

Route::get('login5', function () {
    return view('login5');
});