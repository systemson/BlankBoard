<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Setting as Model;

class SettingsController extends Controller
{
    /**
     * Model class.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected $listable = [
        'id', 'name', 'value',
    ];

    public function section(string $section)
    {
        $this->setFilters(['section' => $section]);
        return $this->index();
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index' => 'index',
            'edit' => 'update',
            'update' => 'update',
        ];
    }
}
