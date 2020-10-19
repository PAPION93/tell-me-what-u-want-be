<?php

namespace App\Repository\Eloquent;

use App\Models\Image;
use App\Repository\ImageRepositoryInterface;
use App\Http\Requests\ImageRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    /**
     * ImageRepository constructor.
     *
     * @param Image $model
     */
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Model
     */
    public function createImage(ImageRequest $request): Model
    {
        $path = $request->file('image')->store('public/storage/images');
        return $this->model->create([
            'restaurant_id' => $request->restaurant_id,
            'url' => Storage::url($path),
            'hash_name' => $request->file('image')->hashName(),
            'original_name' => $request->file('image')->getClientOriginalName(),
        ]);
    }
}
