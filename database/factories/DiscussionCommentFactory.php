<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(App\Models\DiscussionComment::class, function (Faker $faker) {
    
    $fileRealPath = UploadedFile::fake()->create('tempfilename.pdf', 10)->store('public/upload');
    
    return [
        'user_id'        => $faker->numberBetween(1, 10),
        'club_id'        => $faker->numberBetween(1, 10),
        'discussion_id'  => $faker->numberBetween(1, 3),
        'commentable_id' => $faker->numberBetween(1, 3),
        'comment'        => $faker->realText(10),
        'image_comment'  => $fileRealPath,
    ];
});
