<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Descuento::class, function (Faker\Generator $faker) {
    return [
        'Nombre' => $faker->name,
        'Valor' => 0,
    ];
});

$factory->define(App\Cuenta_Egreso::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'Nombre' => 0,
    ];
});


$factory->define(App\cuenta_Ingreso::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->name,
        'Nombre' => 0,
    ];
});