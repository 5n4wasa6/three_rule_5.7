<?php

use Illuminate\Database\Seeder;

class MyJournalCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MyJournalComment::class, 10)->create();
    }
}
