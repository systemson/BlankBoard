<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\AccessLog as Model;

class AccessLogsController extends Controller
{
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
        'user_id', 'user_name', 'user_ip', 'event', 'created_at'
    ];

    /**
     * The columns to oder for the index table.
     *
     * @var array
     */
    protected $order = ['id' => 'desc'];

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index' => 'index'
        ];
    }
}
