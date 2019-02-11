<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Module as Model;
use App\Http\Controllers\Admin\Traits\Validations\ModulesValidationTrait as Validations;

class ModulesController extends Controller
{
    use Validations;

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
        'id', 'name', 'slug', 'status',
    ];

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
