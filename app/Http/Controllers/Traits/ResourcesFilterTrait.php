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

    /**
     * Get the columns to select for the index.
     *
     * @return array
     */
    public function getListable(): array
    {
        return $this->listable;
    }

    /**
     * Set the columns to select for the index.
     *
     * @return array
     */
    public function setListable(array $listable)
    {
        $this->listable = $listable;
    }

    /**
     * Get the filters for the index resource list.
     *
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * Set the filters for the index resource list.
     *
     * @return array
     */
    public function setFilters(array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * Get the resources list.
     *
     * @return array
     */
    protected function resourcesList(string $model)
    {
        return $model::resources(
            $this->getListable(),
            $this->getFilters(),
            $this->order
        )
        ->paginate($this->paginate);
    }
}
