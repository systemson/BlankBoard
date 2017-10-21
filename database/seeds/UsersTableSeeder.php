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
            ['user' => 'admin',
            'name' => 'Administrator',
            'description' => "I am the superadmin user. I have no limitations. Don't use me on production unless you need full permissions granted.",
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'created_at' => Carbon::now(),
            ],
            ['user' => 'devilu',
            'name' => 'Diseños Devilu',
            'description' => "I am the main administration account. Use me when you need permissions to edit this app configuration.",
            'email' => 'devilu@admin.com',
            'password' => bcrypt('devilu'),
            'created_at' => Carbon::now(),
            ],
            ['user' => 'manager',
            'name' => 'Manager',
            'description' => "I am the manager of the app. Use me on a regular basis.",
            'email' => 'user@admin.com',
            'password' => bcrypt('manager'),
            'created_at' => Carbon::now(),
            ],
            ['user' => 'user',
            'name' => 'Default User',
            'description' => "I am the default user. Give me no special permissions.",
            'email' => 'user@admin.com',
            'password' => bcrypt('user'),
            'created_at' => Carbon::now(),
            ],
        ]);
    }
}