<?php

namespace App\Http\Controllers\Traits;

use App\Models\Email;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;

trait EmailActionsTrait
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resource = Email::find(Input::get('parent_id'));

        if($resource != null) {

            $message = [
                'to' => Input::get('forward') != 1 ? $resource->user_id : null,
                'subject' => 'Re: ' . $resource->subject,
                'body' =>
                    "\n\n\n\n\n" .
                    '------------------------------------------------------------' . "\n" .
                    __('emails.table.from') . ': ' . User::find($resource->user_id)->name . "\n" .
                    __('emails.table.to') . ': ' . User::whereIn('id', $resource->recipients)->get()->pluck('name')->implode(', ') . "\n" .
                    __('emails.table.subject') . ': ' . $resource->subject . "\n" .
                    __('emails.table.date') .  ': ' . $resource->created_at . "\n" .
                    '------------------------------------------------------------' . "\n" .
                    "\n" .
                    str_limit($resource->body, 1195),
            ];

        } else {
            $message = null;
        }

        /** Show the form for creating a new resource. */
        return view('admin.' . $this->name . '.create')
        ->with('name', $this->name)
        ->with('message', $message);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required',
            'subject' => 'required|max:80',
            'body' => 'nullable|max:1200',
        ]);

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
            ->route($this->name . '.index')
            ->with('success', 'email-sended');
        } else {
            return redirect()
            ->route($this->name . '.index')
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

        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction([
            $resource
        ]);

        /** Mark current email as read */
        if($resource->user_id != auth()->id() && $this->getPivotColumn($resource->recipients(), 'is_read') === 0) {
            $this->updatePivotColumn($resource->recipients(), ['is_read' => 1]);
        }

        /** Displays the specified resource page */
        return view('admin.' . $this->name . '.show')
        ->with('resource', $resource)
        ->with('name', $this->name);
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

        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction([
            $resource
        ]);

        $message = [
            'to' => $resource->recipients->pluck('id'),
            'subject' => $resource->subject,
            'body' => $resource->body,
        ];

        /** Displays the edit resource page */
        return view('admin.' . $this->name . '.edit')
        ->with('resource', $resource)
        ->with('name', $this->name)
        ->with('message', $message);
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

        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction([
            $resource
        ]);

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
            ->route($this->name . '.index')
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

        /** Check if logged in user is authorized to make this request */
        $this->authorize([
            $resource
        ]);

        /** Move email to trash folder */
        if(($resource->hasOwner(auth()->id()) && $resource->status == 1) || $this->getPivotColumn($resource->recipients(), 'status') == 1) {
            $this->trashEmail($resource);

            /** Redirect back */
            return back()->with('warning', 'email-trashed');

        } elseif(($resource->hasOwner(auth()->id()) && $resource->status < 1) || $this->getPivotColumn($resource->recipients(), 'status') == -1) {

            /** Delete email */
            $this->deleteEmail($resource);

            /** Redirect back */
            return redirect()
            ->route($this->name . '.trash')
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

        /** Check if logged in user is authorized to make this request */
        $this->authorize([
            $resource
        ]);

        /** Restore email to sent folder */
        if($resource->user_id == auth()->id()) {

            $resource->update(['status' => 1]);

            /** Redirect back */
            return back()->with('info', 'email-restored');
        }

        /** Restore email to inbox folder */
        $this->updatePivotColumn($resource->recipients(), ['status' => 1]);

        /** Redirect back */
        return back()->with('info', 'email-restored');

    }

    protected function trashEmail(Email $email)
    {
        if($email->hasOwner(auth()->id())) {
            $email->update(['status' => -1]);
        } else {
            $this->updatePivotColumn($email->recipients(), ['status' => -1]);
        }
    }

    protected function deleteEmail(Email $email)
    {
        if($email->hasOwner(auth()->id())) {
            $email->update(['status' => -2]);
        } else {
            $this->updatePivotColumn($email->recipients(), ['status' => -2]);
        }
    }
}