<?php

namespace App\Http\Controllers\Admin;

use App\Models\Email as Model;
use App\Http\Controllers\ResourceController as Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Admin\Traits\EmailFoldersTrait;

class EmailsController extends Controller
{
    use EmailFoldersTrait;

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
                'status' => Input::get('status'),
            ]);

            /** Syncronize both tables through pivot table */
            $resource->recipients()->sync(Input::get('to'));

        }, 5);

        /** Redirect to inbox */
        if(Input::get('status') == 1) {
            return redirect()
            ->route($this->route . '.index')
            ->with('success', 'email-sended');
        } else {
            return redirect()
            ->route($this->route . '.index')
            ->with('info', 'email-drafted');
        }
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

        /** Mark current email as read */
        if($resource->user_id != auth()->id() && $resource->recipients()->wherePivot('user_id', auth()->id())->first()->pivot->is_read === 0) {
            $resource->recipients()
            ->updateExistingPivot(auth()->id(), ['is_read' => 1], false);
        }

        /** Displays the specified resource page */
        return view('admin.' . $this->route . '.show')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id the specified resource id.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', [$this->model, $resource]);

        /** Displays the edit resource page */
        return view('admin.' . $this->route . '.edit')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', [$this->model, $resource]);
        DB::transaction(function () use ($resource) {

            /** Update the specified resource */
            $resource->update([
                'user_id' => auth()->user()->id,
                'subject' => Input::get('subject'),
                'body' => Input::get('body'),
                'status' => Input::get('status'),
            ]);

            /** Syncronize both tables through pivot table */
            $resource->recipients()->sync(Input::get('to'));

        }, 5);

        if(Input::get('status') == 1) {

            /** If email is sended, redirect to inbox */
            return redirect()
            ->route($this->route . '.index')
            ->with('success', 'email-sended');

        } else {

            /** If email is drafted, redirect back */
            return back()
            ->with('info', 'email-updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Check if logged user is authorized to delete resources */
        $this->authorize('delete', [$this->model, $resource]);

        /** Delete the specified resource */
        if($resource->user_id == auth()->id() && $resource->status > 0) {

            /** Set email to trashed status */
            $resource->update(['status' => -1]);

            /** Redirect back */
            return back()->with('warning', 'email-trashed');

        } elseif($resource->user_id == auth()->id()) {

            /** Set email to deleted status */
            $resource->update(['status' => -2]);

            /** Redirect back */
            return back()->with('danger', 'email-deleted');

        } else {

            return back()
            ->with('danger', 'email-deleted');
        }
    }
}