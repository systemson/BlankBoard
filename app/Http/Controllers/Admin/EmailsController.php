<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email as Model;
use App\Http\Controllers\ResourceController as Controller;
use App\Http\Controllers\Traits\EmailFoldersTrait;
use App\Http\Controllers\Traits\EmailActionsTrait;
use App\Http\Controllers\Traits\PivotTrait;

class EmailsController extends Controller
{
    use EmailFoldersTrait,
        EmailActionsTrait,
        PivotTrait;

    /**
     * Model class.
     *
     * @var class
     */
    protected $model = Model::class;
}
