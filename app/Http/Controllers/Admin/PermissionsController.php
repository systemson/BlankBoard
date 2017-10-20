<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Permission as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;

class PermissionsController extends ResourceController
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $route = 'permissions';

    /**
     * Model class.
     *
     * @var class
     */
    protected $model = Model::class;

    /**
     * Amount of resources to load from model.
     *
     * @var int
     */
    protected $paginate = 15;
}