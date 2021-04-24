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
        // $this->call(UsersTableSeeder::class);

        $users_path = 'public/sqls/users.sql';
        DB::unprepared(file_get_contents($users_path));
        $this->command->info('Users added');

        $posts_path = 'public/sqls/posts.sql';
        DB::unprepared(file_get_contents($posts_path));
        $this->command->info('Posts added');
    }
}
