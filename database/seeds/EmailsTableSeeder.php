<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EmailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emails')->insert([
            ['user_id' => 1, 'subject' => 'Test 0', 'body' => 'Test', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
