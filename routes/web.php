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

route::get('terapista/crear','TerapistaController@create');
route::post('terapista/crear','TerapistaController@store');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

route::get('terapista/index', 'TerapistaController@index');

route::get('terapista/modificar', 'TerapistaController@modificar');