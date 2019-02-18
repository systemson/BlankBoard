<?php

namespace App\Models;

use Illuminate\Pagination\LengthAwarePaginator as BasePaginator;

class LengthAwarePaginator extends BasePaginator
{
    /**
     * Render the table using the given view.
     *
     * @param  string|null  $view
     * @param  array  $data
     * @return \Illuminate\Support\HtmlString
     */
    public function listable($view = null, $data = [])
    {
        return $this->render($view, array_merge($data, [
        	'resources' => $this,
        ]));
    }
}
