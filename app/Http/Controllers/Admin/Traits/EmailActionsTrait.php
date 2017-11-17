<?php

namespace App\Http\Controllers\Admin\Traits;

use App\Models\Email;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;

trait EmailActionsTrait
{
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
     * Trash/Delete status to the specified email.
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

        /** Move email to trash folder */
        if(($resource->hasOwner(auth()->id()) && $resource->status == 1) || $resource->getPivotStatus(auth()->id()) == 1) {
            $this->trashEmail($resource);

            /** Redirect back */
            return back()->with('warning', 'email-trashed');

        } elseif(($resource->hasOwner(auth()->id()) && $resource->status < 1) || $resource->getPivotStatus(auth()->id()) == -1) {

            /** Delete email */
            $this->deleteEmail($resource);

            /** Redirect back */
            return redirect()
            ->route($this->route . '.trash')
            ->with('danger', 'email-deleted');
        }
    }

    /**
     * Restore the specified Trashed/Deleted email.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Check if logged user is authorized to delete resources */
        $this->authorize('delete', [$this->model, $resource]);

        /** Restore email to sent folder */
        if($resource->user_id == auth()->id()) {

            $resource->update(['status' => 1]);

            /** Redirect back */
            return back()->with('info', 'email-restored');
        }

        /** Restore email to inbox folder */
        $resource->recipients()
        ->updateExistingPivot(auth()->id(), ['status' => 1], false);

        /** Redirect back */
        return back()->with('info', 'email-restored');

    }

    protected function trashEmail(Email $email)
    {
        if($email->hasOwner(auth()->id())) {
            $email->update(['status' => -1]);
        } else {
            $email->recipients()
            ->updateExistingPivot(auth()->id(), ['status' => -1], false);
        }
    }

    protected function deleteEmail(Email $email)
    {
        if($email->hasOwner(auth()->id())) {
            $email->update(['status' => -2]);
        } else {
            $email->recipients()
            ->updateExistingPivot(auth()->id(), ['status' => -2], false);
        }
    }
}