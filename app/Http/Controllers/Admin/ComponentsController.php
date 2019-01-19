<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Component as Model;
//use App\Http\Controllers\Admin\Traits\Validations\ArticlesValidationTrait as Validations;

class ComponentsController extends Controller
{
    //use Validations;

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
        'id', 'name', 'order',
    ];

    /**
     * The columns to oder for the index table.
     *
     * @var array
     */
    protected $order = ['order' => 'asc'];

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index' => 'index',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}