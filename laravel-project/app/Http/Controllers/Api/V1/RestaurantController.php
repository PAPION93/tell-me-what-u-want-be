<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use App\Repository\RestaurantRepositoryInterface;

class RestaurantController extends Controller
{
    private $restaurantRepository;

    public function __construct(RestaurantRepositoryInterface $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->restaurantRepository->get($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $restaurants = $this->restaurantRepository->create($request->all());
        return response()->json($restaurants, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = $this->restaurantRepository->find($id);

        $query = $restaurant->name;
        if ($restaurant->address) {
            $dong = explode(' ', $restaurant->address)[2];
            $query = $dong . ' ' . $restaurant->name;
        }
        $blogs = $this->restaurantRepository->getBlog($query);

        return response()->json([
            'restaurant' => $restaurant,
            'naver_blogs' => $blogs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restaurantRepository->delete($id);
    }
}
