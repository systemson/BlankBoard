<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email as Model;
use App\Http\Controllers\ResourceController as Controller;
use App\Http\Controllers\Admin\Traits\EmailFoldersTrait;
use App\Http\Controllers\Admin\Traits\EmailActionsTrait;
use App\Http\Controllers\Admin\Traits\PivotTrait;

class EmailsController extends Controller
{
    use EmailFoldersTrait,
        EmailActionsTrait,
        PivotTrait;

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
}
