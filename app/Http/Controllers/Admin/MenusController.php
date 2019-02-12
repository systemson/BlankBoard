<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Menu as Model;
use App\Models\MenuItem;
use App\Http\Controllers\Admin\Traits\Validations\MenusValidationTrait as Validations;

class MenusController extends Controller
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
        'id', 'name', 'status',
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
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }

    public function edit($id)
    {
        $this->setListable(['id', 'title', 'url', 'status']);
        $this->setFilters(['menu_id' => $id]);
        $this->registerModule('menu_items', $this->resourceAbilityMap());
        
        $menu_items = $this->resourcesList(MenuItem::class);

        return parent::edit($id)
        ->withResources($menu_items)
        ->withModule($this->module);
    }
}
