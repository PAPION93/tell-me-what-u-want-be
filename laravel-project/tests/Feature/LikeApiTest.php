<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Like;
use App\Models\Restaurant;

class LikeApiTest extends TestCase
{
    /** @test  */
    public function user_can_like()
    {
        $restaurant = Restaurant::factory()->create();
        $this->actingAs($user ?? $this->user())
            ->json('POST', "/api/v1/restaurants/{$restaurant->id}/likes")
            ->assertOk();
        $this->assertCount(1, $restaurant->likes);
    }

    /** @test  */
    public function user_can_dislike()
    {
        $user = $this->user();
        $restaurant = Restaurant::factory()->create();
        Like::factory()->create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $user->id
        ]);

        $this->actingAs($user)
        ->json('DELETE', "/api/v1/restaurants/{$restaurant->id}/likes")
                ->assertOk();
        $restaurant->refresh();
        $this->assertCount(0, $restaurant->likes);
    }

    /** @test */
    public function user_can_get_like_list()
    {
        $user = $this->user();
        Like::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user)
            ->json('GET', '/api/v1/users/me/likes')
            ->assertOk()
            ->assertJsonStructure([
                'current_page',
                'data' => [[
                    'id',
                    'name',
                    'category',
                    'address',
                    'google_point',
                    'naver_point',
                    'dining_point',
                    'lat',
                    'lng',
                ]]
            ]);
    }
}
