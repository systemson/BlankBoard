<?php

namespace App\Helpers;

use App\Models\Setting as Model;

class Settings
{
    private static $instance;

    private $settings = [];

    public function __get($key)
    {
        if (empty($settings)) {
            try {
                $this->settings = Model::all()->pluck('value', 'slug')->toArray();
            } catch (\Exception $e) {
                //
            }
        }
        return $this->settings[$key] ?? null;
    }

    public static function getInstance(): self
    {
    	if (!self::$instance instanceof static) {
    		self::$instance = new static;
    	}
    	return self::$instance;
    }
}