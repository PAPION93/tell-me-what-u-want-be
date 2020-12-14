<?php

namespace App\Repository\Eloquent;

use App\Models\Like;
use App\Repository\LikeRepositoryInterface;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{
    public function __construct(Like $model)
    {
        parent::__construct($model);
    }

    public function likes()
    {
    }

    public function isLiked()
    {
    }
}
