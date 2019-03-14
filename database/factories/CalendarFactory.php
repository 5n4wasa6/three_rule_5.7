<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Calendar::class, function (Faker $faker) {
    return [
        'user_id'     => $faker->numberBetween(1, 15),
        'club_id'     => $faker->numberBetween(1, 10),
        'start'       => $faker->date($format='y-m-d',$min='2019-2-1',$max='now'),
        'end'         => $faker->date($format='y-m-d', $min='2019-2-1',$max='now'),
        'title'       => $faker->realText(10),
        'tag'         => $faker->numberBetween(1, 4),
        'schedule'    => "練習",
        'start_time'  => "10:00",
        'end_time'    => "11:00",
        'url'         => $faker->url,
        'description' => $faker->realText(20)
    ];
});
