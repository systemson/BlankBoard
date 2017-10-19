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
        $roles = [
            1,
        ];

        $permissions = 100;

        foreach($roles as $role) {

            for ($x = 1; $x <= $permissions; $x++) {

                $insert[] = ['role_id' => $role, 'permission_id' => $x];
            }
        }

        DB::table('permission_role')->insert($insert);
    }
}
