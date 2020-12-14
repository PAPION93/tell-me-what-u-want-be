<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Services\LikeService;
use App\Http\Controllers\Controller;

class RestaurantLikeController extends Controller
{
    private $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index()
    {
        return response()->json('', 200);
    }

    public function store(Request $request)
    {
        $this->likeService->like($request->restaurant);
        return response('', 200);
    }

    public function destroy(Request $request)
    {
        $this->likeService->dislike($request->restaurant);
        return response('', 200);
    }
}
