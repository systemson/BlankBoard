<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email as Model;
use App\Http\Controllers\ResourceController as Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;

class EmailsController extends Controller
{
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
        'view', 'create'
    ];

    /**
     * Show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Get the resources from the model */
        $resources = auth()->user()
        ->emails()
        ->paginate($this->paginate);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () {

            /** Update the specified resource */
            $resource = $this->model::create([
                'user_id' => auth()->user()->id,
                'subject' => Input::get('subject'),
                'body' => Input::get('body'),
            ]);

            /** Syncronize both tables through pivot table */
            $resource->recipients()->sync(Input::get('to'));

        }, 5);


        /** Redirect to newly created resource page */
        return redirect()
        ->route($this->route . '.index')
        ->with('success', 'resource-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Check if logged user is authorized to view resources */
        $this->authorize('view', [$this->model, $resource]);

        /** Displays the specified resource page */
        return view('admin.' . $this->route . '.show')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Show the sent mail list.
     *
     * @return \Illuminate\Http\Response
     */
    public function sentEmails()
    {
        /** Get the resources from the model */
        $resources = auth()->user()
        ->sentEmails()
        ->paginate($this->paginate);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }

    /**
     * Show the sent mail list.
     *
     * @return \Illuminate\Http\Response
     */
    public function draftEmails()
    {
        /** Get the resources from the model */
        $resources = auth()->user()
        ->draftEmails()
        ->paginate($this->paginate);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }

    /**
     * Show the sent mail list.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashedEmails()
    {
        /** Get the resources from the model */
        $resources = auth()->user()
        ->trashedEmails()
        ->paginate($this->paginate);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }
}