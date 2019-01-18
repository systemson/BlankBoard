<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Module as Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ArticlesValidationTrait;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ModulesController extends Controller
{
    //use ArticlesValidationTrait;

    /**
     * Model class.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * The columns to select for the index table.
     *
     * @var array
     */
    protected $select = [
        'id', 'name', 'resource', 'status',
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