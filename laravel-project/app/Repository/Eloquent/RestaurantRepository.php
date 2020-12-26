<?php

namespace App\Repository\Eloquent;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
                        ->lat($request->southLat, $request->northLat)
                        ->lng($request->westLng, $request->eastLng)
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

    public function getBlog($query)
    {
        $response = Http::withHeaders([
            'X-Naver-Client-Id' => config('api.x_naver_client_id'),
            'X-Naver-Client-Secret' => config('api.x_naver_client_secret'),
        ])->get('https://openapi.naver.com/v1/search/blog.json', [
            'query' => $query,
            'display' => 5,
            'start' => 1,
            'sort' => 'sim',
        ]);

        return $response = json_decode($response, true);
    }
}
