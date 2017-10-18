<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Models\Role as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    private $route = 'roles';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $resources = Model::paginate(10);

        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.' . $this->route . '.create')
        ->with('name', $this->route);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        $resource = new Model;
        $resource->create(Input::all());

        return redirect()->route($this->route . '.show', $resource->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id current resource id.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $resource = Model::findOrFail($id);

        return view('admin.' . $this->route . '.show')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id current resource id.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $resource = Model::findOrFail($id);

        return view('admin.' . $this->route . '.edit')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id current resource id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $resource = Model::findOrFail($id);
        $resource->update(Input::all());

        return back()
        ->with('success', 'Product has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id current resource id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $resource = Model::findOrFail($id);
        $resource->delete();

        return redirect()->route($this->route);
    }
}
