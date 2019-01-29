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
            /*[
                'title' => 'Default',
            	'url' => 'default',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],*/
            [
                'title' => 'Home',
                'url' => '#component-intro',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Services',
                'url' => '#component-services',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Packages',
                'url' => '#component-packs',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Contact us',
                'url' => '#component-contactus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
