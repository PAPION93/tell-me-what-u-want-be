<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Services\RestaurantLikeService;
use App\Http\Controllers\Controller;

class RestaurantLikeController extends Controller
{
    private $likeService;

    public function __construct(RestaurantLikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index()
    {
        return $this->likeService->get();
    }

    public function store(Request $request)
    {
        $this->likeService->like($request->restaurant);
    }

    public function destroy(Request $request)
    {
        $this->likeService->dislike($request->restaurant);
    }
}
