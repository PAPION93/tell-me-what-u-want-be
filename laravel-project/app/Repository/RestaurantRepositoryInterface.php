<?php

namespace App\Repository;

use Illuminate\Support\Collection;

interface RestaurantRepositoryInterface
{
    public function all(): Collection;
}
