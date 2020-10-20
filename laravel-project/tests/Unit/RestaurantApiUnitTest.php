<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Image;

class RestaurantApiUnitTest extends TestCase
{
    public function test_it_can_create_an_restaurant()
    {
        $data = [
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'description' => $this->faker->sentence,
        ];

        $this->post('/api/v1/restaurants', $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_get_restaurants()
    {
        $restaurant = factory(Restaurant::class, 3)->create();

        $this->get('/api/v1/restaurants')
            ->assertOk()
            ->assertJsonStructure([[
                'id',
                'name',
                'address',
                'description',
            ]]);
    }

    public function test_get_restaurants_with_images()
    {
        factory(Restaurant::class, 2)
            ->create()
            ->each(function ($restaurant) {
                factory(Image::class, 3)
                    ->create([
                        'restaurant_id' => $restaurant
                    ]);
            });
        $res = $this->get('/api/v1/restaurants/images');
        $res->dump();
        $res->assertOk();
    }
}
