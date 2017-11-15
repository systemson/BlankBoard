<?php

namespace App\Http\Controllers\Admin\Traits;

trait EmailFoldersTrait
{

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