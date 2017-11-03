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
        ];

        $abilities = [
            'Module',
            'View',
            'Create',
            'Update',
            'Delete',
        ];

        foreach($modules as $module) {
            foreach($abilities as $ability) {
                $insert[] = [
                    'name' => $ability . ' ' . $module,
                    'slug' => strtolower($ability . '_' . str_replace(' ', '_', $module)),
                    'module' => $module,
                    'created_at' => Carbon::now(),
                ];
            }
        }

        DB::table('permissions')->insert($insert);
    }
}
