<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Restaurant;

class LikeApiTest extends TestCase
{
    /** @test  */
    public function user_can_like($user = null)
    {
        $restaurant = Restaurant::factory()->create();
        $this->actingAs($user ?? $this->user())
            ->json('POST', "/api/v1/restaurants/{$restaurant->id}/likes")
            ->assertOk();
        $this->assertCount(1, $restaurant->likes);

        return $restaurant;
    }

    /** @test  */
    public function user_can_dislike()
    {
        $user = $this->user();
        $restaurant = $this->user_can_like($user);

        $this->actingAs($user)
                ->json('DELETE', "/api/v1/restaurants/{$restaurant->id}/likes")
                ->assertOk();
        $restaurant->refresh();
        $this->assertCount(0, $restaurant->likes);
    }
}
