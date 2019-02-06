<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'Site description',
            	'slug' => 'site_description',
                'section' => 'site',
            	'value' => json_encode('Site description'),
                'type' => 'string',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Site keywords',
                'slug' => 'site_keywords',
                'section' => 'site',
                'value' => json_encode('key, words'),
                'type' => 'string',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Public user registration',
                'slug' => 'user_registration',
                'section' => 'site',
                'value' => json_encode(false),
                'type' => 'boolean',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Number test',
                'slug' => 'number',
                'section' => 'test',
                'value' => json_encode(0),
                'type' => 'integer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Date test',
                'slug' => 'date',
                'section' => 'test',
                'value' => json_encode(Carbon::now()->toDateString()),
                'type' => 'date',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Time test',
                'slug' => 'time',
                'section' => 'test',
                'value' => json_encode(Carbon::now()->toTimeString()),
                'type' => 'time',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Timestamp test',
                'slug' => 'timestamp',
                'section' => 'test',
                'value' => json_encode(Carbon::now()->toDayDateTimeString()),
                'type' => 'timestamp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
