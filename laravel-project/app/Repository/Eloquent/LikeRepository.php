<?php

namespace App\Repository\Eloquent;

use App\Models\Like;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use App\Repository\LikeRepositoryInterface;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{
    public function __construct(Like $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return Restaurant::whereHas('likes', function (Builder $query) {
            $query->where('user_id', auth()->id());
        })->paginate();
    }
}
