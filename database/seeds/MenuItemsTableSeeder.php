<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->insert([
            [
                'title' => 'Default',
                'url' => 'default',
                'menu_id' => 1,
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
