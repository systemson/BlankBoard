<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Setting as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Traits\PermissionValidationTrait;

class SettingsController extends Controller
{
    //use PermissionValidationTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name = 'settings';

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
        'id', 'name', 'value',
    ];

    public function site()
    {
        $this->where = ['section' => 'site'];
        return $this->index();
    }
}