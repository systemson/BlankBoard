<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizeActionTrait;
use App\Http\Controllers\Traits\ResourceActionsTrait;
use Illuminate\Http\Request;
use App\Models\Module;

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

    protected $module;

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

        /* Set the controller resource name. */
        $this->name = $this->getName();

        /* Register the resource */
        $this->register();
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

    public function register(): void
    {
    	$map = $this->resourceAbilityMap();

    	$this->module = Module::firstOrCreate(['slug' => $this->name],
    	[
    		'name' => ucwords(str_replace('_', ' ', $this->name)),
    		'can_create' => in_array('create', $map),
    		'can_read' => in_array('view', $map),
    		'can_update' => in_array('update', $map),
    		'can_delete' => in_array('delete', $map),
    	]);

        /* Store the resource permissions on DB */
        $this->registerPermissions($map);
    }
}
