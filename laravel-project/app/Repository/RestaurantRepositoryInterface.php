<?php

namespace App\Repository;

use Illuminate\Http\Request;

interface RestaurantRepositoryInterface
{
    public function get(Request $request);

    public function getLikes();
}
