<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([]);
    }
}
