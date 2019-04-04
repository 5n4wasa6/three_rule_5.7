<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CalendarsTableSeeder::class);
        $this->call(ClubMembersTableSeeder::class);
        $this->call(ClubsTableSeeder::class);
        $this->call(DiscussionCommentCountsTableSeeder::class);
        $this->call(DiscussionCommentsTableSeeder::class);
        $this->call(DiscussionCountsTableSeeder::class);
        $this->call(DiscussionsTableSeeder::class);
        $this->call(FansTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MyJournalCommentCountsTableSeeder::class);
        $this->call(MyJournalCommentsTableSeeder::class);
        $this->call(MyJournalCountsTableSeeder::class);
        $this->call(MyJournalsTableSeeder::class);
        $this->call(MypagesTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
