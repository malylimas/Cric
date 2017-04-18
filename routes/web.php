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

/*Paciente*/
route::get('Paciente/crear','PacienteController@crear');
route::post('Paciente/crear','PacienteController@store');
route::get('Paciente/index','PacienteController@index');
route::get('Paciente/modificar/{paciente}','PacienteController@modificar');
route::post('Paciente/modificar/{paciente}','PacienteController@put');
route::get('Paciente/eliminar/{paciente}','PacienteController@eliminar');
route::post('Paciente/eliminar/{paciente}','PacienteController@delete');
route::get('Paciente/habilitar/{id}','PacienteController@habilitar');
route::post('Paciente/habilitar/{id}','PacienteController@success');


//Citas
route::get('cita/crear','CitaController@crear');
route::post('cita/crear/{paciente}','CitaController@store');
route::get('cita/index','CitaController@index');
route::get('cita/modificar/{cita}','CitaController@modificar');
route::post('cita/modificar/{cita}','CitaController@put');
route::get('cita/eliminar/{cita}','CitaController@eliminar');
route::post('cita/eliminar/{cita}','CitaController@delete');
route::get('cita/habilitar/{id}','CitaController@habilitar');
route::post('cita/habilitar/{id}','CitaController@success');
route::get('cita/reportes/ingresos','CitaController@reporteIngresos');


//Reporte de Citas
route::get('cita/imprimir/{cita}','CitaController@imprimir');
route::get('terapista/disponibilidad/{terapista}','TerapistaController@disponibilidad');
route::get('Paciente/pacientesatendidos/','PacienteController@pacientesatendidos');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//modulo de Contabilidad
Route::get('/home', 'HomeController@index');


Route::resource('factura','FacturaController');

Route::resource('ingreso', 'CuentaIngresoController');
Route::resource('Egreso', 'CuentaEgresoController');

Route::get('factura/imprimir/{factura}','FacturaController@imprimir');



