<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ImageRequest;

interface ImageRepositoryInterface
{
    public function createImage(ImageRequest $request): Model;
}
