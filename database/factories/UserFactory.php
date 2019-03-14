<?php

use Illuminate\Support\Str;
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
    return [
        'name'           => $faker->name,
        'birthday'       => $faker->date($format='Y-m-d',$min='1970-1-1',$max='now'),
        'email'          => $faker->unique()->safeEmail,
        'password'       => Hash::make('testtest'), 
        'provider'       => null,
        'provider_id'    => null,
        'remember_token' => str_random(10),
    ];
});
