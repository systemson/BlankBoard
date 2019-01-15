<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            [
                'name' => 'Site description',
            	'slug' => 'site_description',
            	'section' => 'site',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Site keywords',
            	'slug' => 'site_keywords',
            	'section' => 'site',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
