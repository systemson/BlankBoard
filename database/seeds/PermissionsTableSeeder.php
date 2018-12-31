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
            'Users',
            'Roles',
            'Permissions',
            'Categories',
            'Articles',
        ];

        $abilities = [
            'View',
            'Create',
            'Update',
            'Delete',
        ];

        $except = [
            'Permissions.Create',
            'Permissions.Delete',
            'Roles.View',
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
