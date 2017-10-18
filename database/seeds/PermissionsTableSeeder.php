<?php

use Illuminate\Database\Seeder;

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
            'users',
            'roles',
            'permissions',
        ];

        $abilities = [
            'module',
            'view',
            'create',
            'update',
            'delete',
        ];

        foreach($modules as $module) {
            foreach($abilities as $ability) {
                $insert[]['name'] = $ability . '_' . $module;
            }
        }

        DB::table('permissions')->insert($insert);
    }
}
