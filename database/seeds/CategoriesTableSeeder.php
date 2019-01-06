<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Default',
            	'slug' => 'default',
            	'created_by' => 1,
            	'created_at' => Carbon::now(),
            	'updated_by' => 1,
            	'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
