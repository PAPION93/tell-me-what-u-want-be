<?php

namespace App\Repository\Eloquent;

use App\Models\Restaurant;
use App\Repository\RestaurantRepositoryInterface;
use Illuminate\Support\Collection;

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

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }
}
