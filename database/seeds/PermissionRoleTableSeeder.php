<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total = Permission::count();

        $permissions = [];

        for ($x=1; $x<= $total; $x++) {
            $permissions[] = ['role_id' => 2, 'permission_id' => $x];
        }

        DB::table('permission_role')->insert($permissions);
    }
}
