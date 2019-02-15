<?php

namespace App\Models;

use Illuminate\Pagination\LengthAwarePaginator as BasePaginator;

class LengthAwarePaginator extends BasePaginator
{
    /**
     * Render the paginator using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return \Illuminate\Support\HtmlString
     */
    public function list($view = null, $data = [])
    {
        return $this->render('admin.includes.actions.lists', array_merge($data, [
        	'resources' => $this->items(),
        ]));
    }
}
