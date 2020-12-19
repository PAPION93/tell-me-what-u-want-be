<?php

namespace App\Repository\Eloquent;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Repository\RestaurantRepositoryInterface;

class RestaurantRepository extends BaseRepository implements RestaurantRepositoryInterface
{
    /**
     * RestaurantRepository constructor.
     *
     * @param Restaurant $model
     */
    public function __construct(Restaurant $model)
    {
        parent::__construct($model);
    }

    public function get(Request $request)
    {
        return $this->model->name($request->name)
                        ->category($request->category)
                        ->googlePoint($request->google_point)
                        ->naverPoint($request->naver_point)
                        ->diningPoint($request->dining_point)
                        ->lat($request->northLat, $request->southLat)
                        ->lng($request->eastLng, $request->westLng)
                        ->with('images')
                        ->withCount(['likes' => function ($query) {
                            $query->where('user_id', auth()->id());
                        }])
                        ->paginate();
    }

    public function getLikes()
    {
        return $this->model->with('images')
        ->whereHas('likes', function (Builder $query) {
            $query->where('user_id', auth()->id());
        })
        ->paginate();
    }
}
