<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ResourceController as Controller;
use App\Models\Article as Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ArticlesValidationTrait;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    use ArticlesValidationTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name = 'articles';

    /**
     * Model class.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * The columns to select for the index table.
     *
     * @var array
     */
    protected $select = [
        'id', 'title', 'created_by', 'category_id', 'status', 'created_at',
    ];

    /**
     * The columns to oder for the index table.
     *
     * @var array
     */
    protected $order = ['id' => 'desc'];

    public function archived()
    {
        $this->where = ['status' => -4];
        return $this->index();
    }

    public function highlighted()
    {
        $this->where = ['highlighted' => 1];
        return $this->index();
    }

    public function store()
    {
        if (Input::hasFile('image_file')) {
            $this->storeImage();
        }

        return parent::store();
    }

    public function update($id)
    {
        if (Input::hasFile('image_file')) {
            $this->updateImage($id);
        }

        return parent::update($id);
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    protected function storeImage()
    {
        $this->request->validate([
            'image_file' => 'nullable|image',
        ]);

        $path = Storage::disk('public')->putFile('articles', $this->request->file('image_file'));

        Input::merge(['image' => 'storage' . DIRECTORY_SEPARATOR . $path]);
    }

    /**
     *
     *
     * @param int $id The article id.
     * @return \Illuminate\Http\Response
     */
    protected function updateImage($id)
    {
        $this->request->validate([
            'image_file' => 'nullable|image',
        ]);

        $article = $this->model::findOrFail($id);

        if(!is_null($article->image) && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $path = Storage::disk('public')->putFile('articles', $this->request->file('image_file'));

        Input::merge(['image' =>  'storage' . DIRECTORY_SEPARATOR . $path]);
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index' => 'index',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}