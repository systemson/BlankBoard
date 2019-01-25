<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $modules = [
            'AccessLogs',
            'Articles',
            'Categories',
            'Components',
            'Menus',
            'Modules',
            'Permissions',
            'Roles',
            'Users',
            'Settings',
        ];

        $abilities = [
            'View',
            'Create',
            'Update',
            'Delete',
        ];

        $except = [
            'Articles.View',
            'AccessLogs.Create',
            'AccessLogs.Edit',
            'AccessLogs.Delete',
            'AccessLogs.Edit',
            'Categories.View',
            'Components.View',
            'Menu.View',
            'Modules.View',
            'Modules.Create',
            'Modules.Delete',
            'Permissions.View',
            'Permissions.Create',
            'Permissions.Delete',
            'Roles.View',
            'Settings.View',
            'Settings.Create',
            'Settings.Delete',
        ];

        //$insert = collect();

        foreach($modules as $module) {
            foreach($abilities as $ability) {
                if (!in_array($module . '.' . $ability, $except)) {
                    $insert[] = [
                        'name' => $ability . ' ' . $module,
                        'slug' => strtolower($ability . '_' . str_replace(' ', '_', $module)),
                        'module' => $module,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
            }
        }

        //DB::table('permissions')->insert($insert->all());
        DB::table('permissions')->insert($insert);
    }
}
