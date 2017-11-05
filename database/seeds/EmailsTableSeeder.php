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
            ['user_id' => 1, 'subject' => 'Test 0', 'body' => 'Test', 'created_at' => Carbon::now()->subYears(6)],
            ['user_id' => 1, 'subject' => 'Test 1', 'body' => 'Test', 'created_at' => Carbon::now()->subYears(2)],
            ['user_id' => 1, 'subject' => 'Test 2', 'body' => 'Test', 'created_at' => Carbon::now()->subYears(1)],
            ['user_id' => 1, 'subject' => 'Test 3', 'body' => 'Test', 'created_at' => Carbon::now()->subMonths(8)],
            ['user_id' => 1, 'subject' => 'Test 4', 'body' => 'Test', 'created_at' => Carbon::now()->subMonths(2)],
            ['user_id' => 1, 'subject' => 'Test 5', 'body' => 'Test', 'created_at' => Carbon::now()->subMonths(1)],
            ['user_id' => 1, 'subject' => 'Test 6', 'body' => 'Test', 'created_at' => Carbon::now()->subWeeks(3)],
            ['user_id' => 1, 'subject' => 'Test 7', 'body' => 'Test', 'created_at' => Carbon::now()->subDays(7)],
            ['user_id' => 3, 'subject' => 'Test 8', 'body' => 'Test', 'created_at' => Carbon::now()->subHours(5)],
            ['user_id' => 2, 'subject' => 'Test 9', 'body' => 'Test', 'created_at' => Carbon::now()->subSeconds(50)],
        ]);
    }
}
