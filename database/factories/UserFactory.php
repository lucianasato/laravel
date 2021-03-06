<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('pt_BR');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => \Illuminate\Support\Facades\Hash::make('123456'), // secret
        'remember_token' => str_random(10),
        'cpf' => str_random(11),
        'phone' => str_replace(' ', '', $faker->phoneNumber)
    ];
});

$factory->state(\App\User::class, 'admin', function($faker) {
    return [
        'role' => \App\User::ROLE_ADMIN
    ];
});

$factory->state(\App\User::class, 'user', function($faker) {
    return [
        'role' => \App\User::ROLE_USER
    ];
});