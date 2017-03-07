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


/* Terapista*/

route::get('terapista/crear','TerapistaController@crear');
route::post('terapista/crear','TerapistaController@store');
route::get('terapista/modificar/{terapista}','TerapistaController@modificar');
route::post('terapista/modificar/{terapista}','TerapistaController@put');
route::get('terapista/eliminar/{terapista}','TerapistaController@eliminar');
route::post('terapista/eliminar/{terapista}','TerapistaController@delete');
route::get('terapista/habilitar/{id}','TerapistaController@habilitar');
route::post('terapista/habilitar/{id}','TerapistaController@success');
route::get('terapista/index', 'TerapistaController@index');
route::get('terapista/modificar', 'TerapistaController@modificar');

/* Terapia*/

route::get('terapia/crear','TerapiaController@crear');
route::post('terapia/crear','TerapiaController@store');
route::get('terapia/modificar/{terapia}','TerapiaController@modificar');
route::post('terapia/modificar/{terapia}','TerapiaController@put');
route::get('terapia/eliminar/{terapia}','TerapiaController@eliminar');
route::post('terapia/eliminar/{terapia}','TerapiaController@delete');
route::get('terapia/habilitar/{id}','TerapiaController@habilitar');
route::post('terapia/habilitar/{id}','TerapiaController@success');
route::get('terapia/index','TerapiaController@index');


/*Patologia*/
route::get('Patologia/crear','PatologiaController@crear');
route::post('Patologia/crear','PatologiaController@store');
route::get('Patologia/index','PatologiaController@index');
route::get('Patologia/modificar/{Patologia}','PatologiaController@modificar');
route::post('Patologia/modificar/{Patologia}','PatologiaController@put');
route::get('Patologia/eliminar/{Patologia}','PatologiaController@eliminar');
route::post('Patologia/eliminar/{Patologia}','PatologiaController@delete');
route::get('Patologia/habilitar/{id}','PatologiaController@habilitar');
route::post('Patologia/habilitar/{id}','PatologiaController@success');

/*Expediente*/
route::get('expediente/crear','ExpedienteController@crear');
route::post('expediente/crear','ExpedienteController@store');
route::get('expediente/index','ExpedienteController@index');
route::get('expediente/modificar/{expediente}','ExpedienteController@modificar');
route::post('expediente/modificar/{expediente}','ExpedienteController@put');
route::get('expediente/eliminar/{expediente}','ExpedienteController@eliminar');
route::post('expediente/eliminar/{expediente}','ExpedienteController@delete');
route::get('expediente/habilitar/{id}','ExpedienteController@habilitar');
route::post('expediente/habilitar/{id}','ExpedienteController@success');

//Citas
route::get('cita/crear','CitaController@crear');

route::post('cita/crear/{expediente}','CitaController@store');
route::get('cita/index','CitaController@index');



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

