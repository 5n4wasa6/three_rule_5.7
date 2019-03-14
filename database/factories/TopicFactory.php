<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(10),
        'url'   => $faker->url
    ];
});
