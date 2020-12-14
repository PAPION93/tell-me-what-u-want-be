<?php

namespace App\Repository\Eloquent;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use App\Repository\RestaurantRepositoryInterface;

class RestaurantRepository extends BaseRepository implements RestaurantRepositoryInterface
{
    /**
     * RestaurantRepository constructor.
     *
     * @param Restaurant $model
     */
    public function __construct(Restaurant $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->model->with('images')
            ->withCount(['likes' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
        ->paginate();
    }

    public function getLikes()
    {
        return $this->model->whereHas('likes', function (Builder $query) {
            $query->where('user_id', auth()->id());
        })->paginate();
    }
}
