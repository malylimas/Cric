<?php

route::get('terapista/crear','TerapistaController@create');

route::post('terapista','TerapistaController@store');


route::get('terapista/index', 'TerapistaController@index');
route::get('terapista/modificar', 'TerapistaContoller@modificar');
