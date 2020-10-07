<?php
namespace App\Repository;

use App\Models\Restaurant;
use Illuminate\Support\Collection;

interface RestaurantRepositoryInterface
{
    public function all(): Collection;
}
