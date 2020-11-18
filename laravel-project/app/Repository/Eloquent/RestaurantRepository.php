<?php

namespace App\Repository\Eloquent;

use App\Models\Restaurant;
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
        return $this->model->with('images')->paginate(20);
    }
}
