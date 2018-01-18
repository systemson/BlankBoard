<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizeActionTrait;
use App\Http\Controllers\Traits\ResourceActionsTrait;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Lang;

abstract class ResourceController extends Controller
{
    use AuthorizeActionTrait,
    ResourceActionsTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name;

    /**
     * Model class.
     *
     * @var string
     */
    protected $model;

    /**
     * Amount of resources to load from model.
     *
     * @var int
     */
    protected $paginate;

    /**
     * Request.
     *
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * The permissions that should be registered.
     *
     * @var array  view|create|update|delete
     */
    protected $permissions = [
        //
    ];

    /**
    * Instantiate the controller.
    *
    * @return void
    */
    public function __construct(Request $request)
    {
        /** Request instance */
        $this->request = $request;

        /** Store the permissions on DB */
        $this->registerPermissions($this->resourceAbilityMap());
    }
}
