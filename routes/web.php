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

route::get('terapista/crear','TerapistaController@crear');
route::post('terapista/crear','TerapistaController@store');
route::get('terapista/modificar/{terapista}','TerapistaController@modificar');
route::post('terapista/modificar/{terapista}','TerapistaController@put');
route::get('terapista/eliminar/{terapista}','TerapistaController@eliminar');
route::post('terapista/eliminar/{terapista}','TerapistaController@delete');
route::get('terapista/habilitar/{id}','TerapistaController@habilitar');
route::post('terapista/habilitar/{id}','TerapistaController@success');




route::get('terapia/crear','TerapiaController@crear');
route::post('terapia/crear','TerapiaController@store');
route::get('terapia/modificar/{terapia}','TerapiaController@modificar');
route::post('terapia/modificar/{terapia}','TerapiaController@modificar');
route::get('terapia/eliminar/{terapia}','TerapiaController@eliminar');
route::post('terapia/eliminar/{terapia}','TerapiaController@delete');
route::get('terapia/index','TerapiaController@index');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

route::get('terapista/index', 'TerapistaController@index');

route::get('terapista/modificar', 'TerapistaController@modificar');