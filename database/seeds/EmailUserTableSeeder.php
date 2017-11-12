<?php

use Illuminate\Database\Seeder;

class EmailUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_user')->insert([
            ['email_id' => 1, 'user_id' => 1],
            ['email_id' => 1, 'user_id' => 2],
            ['email_id' => 1, 'user_id' => 3],

            ['email_id' => 2, 'user_id' => 1],
            ['email_id' => 2, 'user_id' => 2],
            ['email_id' => 2, 'user_id' => 3],

            ['email_id' => 3, 'user_id' => 1],
            ['email_id' => 3, 'user_id' => 2],
            ['email_id' => 3, 'user_id' => 3],

            ['email_id' => 4, 'user_id' => 1],
            ['email_id' => 4, 'user_id' => 2],
            ['email_id' => 4, 'user_id' => 3],

            ['email_id' => 5, 'user_id' => 1],
            ['email_id' => 6, 'user_id' => 1],
            ['email_id' => 7, 'user_id' => 1],
            ['email_id' => 8, 'user_id' => 1],
            ['email_id' => 9, 'user_id' => 1],
            ['email_id' => 10, 'user_id' => 2],
        ]);
    }
}
