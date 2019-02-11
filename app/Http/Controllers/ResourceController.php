<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizeActionTrait;
use App\Http\Controllers\Traits\ResourcesFilterTrait;
use App\Http\Controllers\Traits\ResourceActionsTrait;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Setting;

abstract class ResourceController extends Controller
{
    use AuthorizeActionTrait,
    ResourcesFilterTrait,
    ResourceActionsTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name;

    /**
     * The resource module.
     *
     * @var string
     */
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
    /*protected $permissions = [
        //
    ];*/

    /**
     * The settings that should be registered.
     *
     * @var array
     */
    protected $settings = [
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

        /* Register the resource */
        $this->registerResource();
    }

    /**
     * Get the resource name from model's table.
     *
     * @return string
     */
    protected function getName(): string
    {
        return with(new $this->model)->getTable();
    }

    /* Register the resource module */

    protected function registerResource(): void
    {
        /* Set the controller resource name. */
        $this->name = $this->getName();

        /* Get the ability map */
        $map = $this->resourceAbilityMap();

        /* Store the resource permissions on DB */
        $this->registerPermissions($map);

        /* Store the resource module on DB */
        $this->registerModule($this->name, $map);

        $this->registerSettings();
    }

    /**
     * Register the permissions required by the controller actions.
     *
     * @param array $abilityMap
     * @return void
     */
    protected function registerPermissions(array $abilityMap): void
    {
        if (!empty($abilityMap)) {
            $abilities = $this->registrableAbilities($abilityMap);

            Permission::register($this->name, $abilities);
        }
    }

    /**
     * Get the unique abilities from an ability map, excluding index.
     *
     * @param array $abilityMap
     * @return array
     */
    protected function registrableAbilities(array $abilityMap): array
    {
        $abilities = array_unique($abilityMap);

        $abilities = array_diff($abilities, ['index']);

        return $abilities;
    }

    /**
     * Register the resource module.
     *
     * @param string $name
     * @param array  $abilityMap
     * @return void
     */
    protected function registerModule(string $name, array $abilityMap): void
    {
        /* Register and get the current module */
        $this->module = Module::firstOrCreate(
            ['slug' => $name],
            [
                'name' => ucwords(str_replace('_', ' ', $name)),
                'can_create' => in_array('create', $abilityMap),
                'can_read' => in_array('view', $abilityMap),
                'can_update' => in_array('update', $abilityMap),
                'can_delete' => in_array('delete', $abilityMap),
            ]
        );

        $this->module->setListable($this->getListable());
    }

    /**
     * Register the permissions required by the controller actions.
     *
     * @param array $abilityMap
     * @return void
     */
    protected function registerSettings(): void
    {
        if (!empty($this->settings)) {
            foreach ($this->settings as $slug => $setting) {
                $setting = Setting::firstOrCreate(
                    ['slug' => $slug, 'section' => $this->name],
                    $setting
                );
            }
        }
    }

    /* Update the resource module */

    protected function updateResource(): void
    {
        /* Set the controller resource name. */
        $this->name = $this->getName();

        /* Get the ability map */
        $map = $this->resourceAbilityMap();

        /* Store the resource permissions on DB */
        $this->registerPermissions($map);

        /* Store the resource module on DB */
        $this->updateModule($this->name, $map);

        $this->updateSettings();
    }

    public function updateResourceAction()
    {
        try {
            $this->updateResource();
            return response()->json(['status' => 'success', 'message' => 'Module successfully registered.']);
        } catch (\Throable $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }

    /**
     * Updates the resource module.
     *
     * @param string $name
     * @param array  $abilityMap
     * @return void
     */
    protected function updateModule(string $name, array $abilityMap): void
    {
        /* Register and get the current module */
        $this->module = Module::updateOrCreate(
            ['slug' => $name],
            [
                'name' => ucwords(str_replace('_', ' ', $name)),
                'can_create' => in_array('create', $abilityMap),
                'can_read' => in_array('view', $abilityMap),
                'can_update' => in_array('update', $abilityMap),
                'can_delete' => in_array('delete', $abilityMap),
            ]
        );
    }

    /**
     * Updates the permissions required by the controller actions.
     *
     * @return void
     */
    protected function updateSettings(): void
    {
        if (!empty($this->settings)) {
            foreach ($this->settings as $slug => $setting) {
                $setting = Setting::updateOrCreate(
                    ['slug' => $slug, 'section' => $this->name],
                    $setting
                );
            }
        }
    }
}
