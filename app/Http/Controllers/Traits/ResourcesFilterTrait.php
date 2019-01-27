<?php

namespace App\Http\Controllers\Traits;

trait ResourcesFilterTrait
{
    /**
     * The attributes that should be listed for the index page.
     *
     * @var array
     */
    protected $listable = [];

    /**
     * The columns to select for the index table.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * The columns to oder for the index table.
     *
     * @var array
     */
    protected $order = ['id' => 'asc'];


    public function getListable(): array
    {
        return $this->listable;
    }

    public function setListable(array $listable)
    {
        $this->listable = $listable;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function setFilters(array $filters)
    {
        $this->filters = $filters;
    }

    protected function resourcesList()
    {
        return $this->model::resources(
            $this->getListable(),
            $this->getFilters(),
            $this->order
        )
        ->paginate($this->paginate);
    }
}
