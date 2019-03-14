<?php

use Illuminate\Database\Seeder;

class DiscussionCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\DiscussionComment::class, 30)->create();
    }
}
