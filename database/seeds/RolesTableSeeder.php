<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            ['name' => 'Super Admin', 'slug' => 'superadmin', 'created_at' => Carbon::now()],
            ['name' => 'Administrator', 'slug' => 'admin', 'created_at' => Carbon::now()],
            ['name' => 'Manager', 'slug' => 'manager', 'created_at' => Carbon::now()],
            ['name' => 'User', 'slug' => 'user', 'created_at' => Carbon::now()],
        ]);
    }
}
