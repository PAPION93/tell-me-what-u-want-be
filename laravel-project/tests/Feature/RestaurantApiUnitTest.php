<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Image;
use App\Models\Restaurant;

class RestaurantApiUnitTest extends TestCase
{
    /** @test */
    public function it_can_create_an_restaurant()
    {
        $data = [
            'name' => $this->faker->name,
            'category' => $this->faker->name,
            'address' => $this->faker->address,
            'google_point' => $this->faker->randomFloat(1, 0, 5),
            'naver_point' => $this->faker->randomFloat(1, 0, 5),
            'dining_point' => $this->faker->randomFloat(1, 0, 5),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
        ];

        $res = $this->post('/api/v1/restaurants', $data)
                    ->assertStatus(201)
                    ->assertJson($data);
    }

    /** @test */
    public function it_can_get_restaurants()
    {
        Restaurant::factory()->count(5)->create();

        $this->get('/api/v1/restaurants')
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
                ]]]);
    }

    /** @test */
    public function it_can_get_restaurants_with_images()
    {
        Restaurant::factory()
            ->create()
            ->each(function ($restaurant) {
                Image::factory()
                    ->create([
                        'restaurant_id' => $restaurant
                    ]);
            });

        $this->get('/api/v1/restaurants')
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
                    'images' => [[
                        'id',
                        'restaurant_id',
                        'hash_name',
                        'original_name',
                    ]]
                ]]
            ]);
    }
}
