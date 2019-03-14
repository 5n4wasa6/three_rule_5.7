<?php

use Illuminate\Database\Seeder;

class MyJournalCountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MyJournalCount::class, 10)->create();
    }
}
