<?php

use Illuminate\Database\Seeder;

class MypagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Mypage::class, 10)->create();
    }
}
