<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permission_role')->insert([

            // Superadmin
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 6],
            ['role_id' => 1, 'permission_id' => 11],
            ['role_id' => 1, 'permission_id' => 16],

            // Administrator
            ['role_id' => 2, 'permission_id' => 1],
            ['role_id' => 2, 'permission_id' => 6],
            ['role_id' => 2, 'permission_id' => 11],

            // Manager
            ['role_id' => 1, 'permission_id' => 1],
        ]);
    }
}
