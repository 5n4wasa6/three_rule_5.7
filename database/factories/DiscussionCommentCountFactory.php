<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DiscussionCommentCount::class, function (Faker $faker) {
    return [
        'user_id'               => $faker->numberBetween(1, 5),
        'discussion_comment_id' => $faker->numberBetween(1, 5)
    ];
});
