<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\ImageRepository;
use App\Repository\Eloquent\RestaurantRepository;

class RestaurantImageController extends Controller
{
    private $restaurantRepository;
    private $imageRepository;

    public function __construct(RestaurantRepository $restaurantRepository, ImageRepository $imageRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        return Restaurant::with('images')->get();
    }
}
