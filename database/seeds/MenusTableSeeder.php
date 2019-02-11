<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name' => 'Default',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
