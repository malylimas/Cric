<?php

/*
here is where you can registrar all of the routes for an aplication.
It's a breeze. Simply tell laravel the uris it should respond to
and give it the controller to call when that uri is requested.
post,get,put,delete

*/

route::get('controlador','PruebaController@index');
/*    
*/
route::get('Cric',CricController);

route::get('prueba',function(){
return "Hola desde routes.php";
});

route::get('nombre/{nombre}', function($nombre){
 return "Mi nombre es: ".$nombre;

});

route::get('/','welcomeContoller@index');
route::get('home','HomeController@index');
route::controllers([ 
    'auth' =>'Auth\AuthController',
    'password' =>'Auth\PasswordController',
  ]);






