<?php

namespace App\Services;

use App\Repository\LikeRepositoryInterface;
use App\Repository\RestaurantRepositoryInterface;

class RestaurantLikeService
{
    private $likeRepo;
    private $restaurantRepo;

    public function __construct(LikeRepositoryInterface $likeRepo, RestaurantRepositoryInterface $restaurantRepo)
    {
        $this->likeRepo = $likeRepo;
        $this->restaurantRepo = $restaurantRepo;
    }

    public function get()
    {
        return $this->restaurantRepo->getLikes();
    }

    public function like($restaurantId)
    {
        $restaurant = $this->restaurantRepo->find($restaurantId);
        if ($restaurant->likes()->where('user_id', auth()->id())->doesntExist()) {
            $this->likeRepo->create([
                'user_id' => auth()->id(),
                'restaurant_id' => $restaurant->id
            ]);
        }
    }

    public function dislike($restaurantId)
    {
        $restaurant = $this->restaurantRepo->find($restaurantId);
        $restaurant->likes()->where('user_id', auth()->id())->delete();
    }
}
