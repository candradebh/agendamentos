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

$factory->define(Oncoclinicas\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(Oncoclinicas\Models\Paciente::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'dtnascimento'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'telefone' => $faker->phoneNumber,

    ];
});
$factory->define(Oncoclinicas\Models\Medico::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->phoneNumber,


    ];
});

$factory->define(Oncoclinicas\Models\Event::class, function (Faker\Generator $faker) {
    return [
        'paciente_id' => rand(1,20),
        'medico_id' => rand(1,9),
        'start_time'=> $faker->dateTimeThisYear,


    ];
});