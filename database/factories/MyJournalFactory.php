<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(App\Models\MyJournal::class, function (Faker $faker) {
    
    $fileRealPath = UploadedFile::fake()->create('tempfilename.pdf', 10)->store('public/upload');
    
    return [
        'user_id'       => $faker->numberBetween(1, 10),
        'activity_at'   => $faker->date($format='Y-m-d',$min='1970-1-1',$max='now'),
        'title'         => $faker->realText(10),
        'appeal'        => $faker->realText(10),
        'improvement'   => $faker->realText(10),
        'nextaction'    => $faker->realText(10),
        'free'          => $faker->realText(20),
        'image'         => $fileRealPath
    ];
});
