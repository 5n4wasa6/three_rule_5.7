<?php

use Illuminate\Database\Seeder;

class MyJournalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MyJournal::class, 10)->create();
    }
}
