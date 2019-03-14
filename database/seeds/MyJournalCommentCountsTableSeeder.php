<?php

use Illuminate\Database\Seeder;

class MyJournalCommentCountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MyJournalCommentCount::class, 10)->create();
    }
}
