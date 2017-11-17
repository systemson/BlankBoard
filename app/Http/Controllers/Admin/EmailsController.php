<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email as Model;
use App\Http\Controllers\ResourceController as Controller;
use App\Http\Controllers\Admin\Traits\EmailFoldersTrait;
use App\Http\Controllers\Admin\Traits\EmailActionsTrait;

class EmailsController extends Controller
{
    use EmailFoldersTrait,
        EmailActionsTrait;

    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $route = 'emails';

    /**
     * Model class.
     *
     * @var class
     */
    protected $model = Model::class;

    /**
     * The actions that should be omitted by the policy.
     *
     * @var array  view|create|update|delete
     */
    protected $publicActions = [
        'create'
    ];
}
