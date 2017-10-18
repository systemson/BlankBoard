<?php

use Illuminate\Database\Seeder;

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
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            ],
            ['user' => 'devilu',
            'name' => 'Diseños Devilu',
            'email' => 'devilu@admin.com',
            'password' => bcrypt('devilu'),
            ]
        ]);
    }
}