<?php

namespace App\Repository;

interface RestaurantRepositoryInterface
{
    public function get();

    public function getLikes();
}
