<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repository\Eloquent\RestaurantRepository;
use App\Repository\Eloquent\ImageRepository;
use App\Models\Restaurant;

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
        return Restaurant::with('image')->get();
    }
}
