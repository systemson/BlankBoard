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
            ['email_id' => 1, 'user_id' => 2],
            ['email_id' => 1, 'user_id' => 3],
        ]);
    }
}
