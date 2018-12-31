<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Article as Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ArticlesValidationTrait;

class ArticlesController extends Controller
{
    use ArticlesValidationTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name = 'articles';

    /**
     * Model class.
     *
     * @var string
     */
    protected $model = Model::class;

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