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
     * Instance of Illuminate\Http\Request.
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
        /* Request instance */
        $this->request = $request;

        /* Store the resource permissions on DB */
        $this->registerPermissions($this->resourceAbilityMap());

        /* Set the controller resource name. */
        $this->name = $this->getName();
    }

    /**
     * Get the resource name from model's table.
     *
     * @return string
     */
    public function getName(): string
    {
    	return with(new $this->model)->getTable();
    }
}
