<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Services\LikeService;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    private $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function index()
    {
        return $this->likeService->likes();
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
