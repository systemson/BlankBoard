<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->insert([

            // Users
            [
                'slug' => 'register_users',
                'value' => 1,
                'module' => 'users',
                'created_at' => Carbon::now(),
            ],
            [
                'slug' => 'create_users',
                'value' => 1,
                'module' => 'users',
                'created_at' => Carbon::now(),
            ],
            [
                'slug' => 'deactivate_users',
                'value' => 0,
                'module' => 'users',
                'created_at' => Carbon::now(),
            ],
            [
                'slug' => 'first_login',
                'value' => 1,
                'module' => 'users',
                'created_at' => Carbon::now(),
            ],
            [
                'slug' => 'change_password',
                'value' => 0,
                'module' => 'users',
                'created_at' => Carbon::now(),
            ],
            [
                'slug' => 'default_password',
                'value' => 'secret',
                'module' => 'users',
                'created_at' => Carbon::now(),
            ],

            // Roles
            [
                'slug' => 'create_roles',
                'value' => 1,
                'module' => 'roles',
                'created_at' => Carbon::now(),
            ],

            // Permissions
            [
                'slug' => 'create_permissions',
                'value' => 1,
                'module' => 'permissions',
                'created_at' => Carbon::now(),
            ],

        ]);
    }
}
