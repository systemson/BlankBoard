<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Permission as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Traits\PermissionValidationTrait;

class PermissionsController extends Controller
{
    use PermissionValidationTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name = 'permissions';

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
        'id', 'name', 'module', 'slug', 'status',
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