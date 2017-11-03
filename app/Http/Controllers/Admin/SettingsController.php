<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Setting as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    /**
     * Update the settings in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', Model::class);

        foreach(Input::all() as $config) {

            /** Get the specified resource */
            $resource = Model::find($config->slug);

            /** Update the specified resource */
            $resource->update($config->value);
        }

        /** Redirect back */
        return back();
    }
}
