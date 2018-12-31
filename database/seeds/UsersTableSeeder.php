<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'user' => 'superadmin',
            'name' => 'Superadmin',
            'last_name' => null,
            'description' => 'I am the superuser. I have no limitations. Don\'t use me on production.',
            'email' => 'admin@admin.com',
            'password' => bcrypt('superadmin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'last_password_change' => Carbon::now(),
            ],
            ['user' => 'admin',
            'name' => 'Administrator',
            'last_name' => null,
            'description' => 'I am the main administration account. Use me when you need to administrate the app.',
            'email' => 'devilu@admin.com',
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'last_password_change' => Carbon::now(),
            ],
            ['user' => 'manager',
            'name' => 'Manager',
            'last_name' => null,
            'description' => 'I am the manager of the app. Use me on a regular basis.',
            'email' => 'user@admin.com',
            'password' => bcrypt('manager'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'last_password_change' => Carbon::now(),
            ],
            ['user' => 'user',
            'name' => 'Default User',
            'last_name' => null,
            'description' => 'I am the default user. Grant me no special permissions.',
            'email' => 'user@admin.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'last_password_change' => null,
            ],
        ]);
    }
}