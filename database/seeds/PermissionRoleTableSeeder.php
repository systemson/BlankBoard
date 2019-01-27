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
        $permissions = [];

        // Administrator permissions
        $admin_permissions = Permission::where('module', '<>', 'Modules')
        ->get(['id']);

        foreach ($admin_permissions as $value) {
            $permissions[] = ['role_id' => 2, 'permission_id' => $value->id];
        }

        // Manager permissions
        $manager_permissions = Permission::where('module', 'Articles')
        ->orWhere('module', 'Categories')
        ->orWhere('module', 'Menus')
        ->orWhere('module', 'Components')
        ->get(['id']);

        foreach ($manager_permissions as $value) {
            $permissions[] = ['role_id' => 3, 'permission_id' => $value->id];
        }

        DB::table('permission_role')->insert($permissions);
    }
}
