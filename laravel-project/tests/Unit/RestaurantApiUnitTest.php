<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Restaurant;

class RestaurantApiUnitTest extends TestCase
{
    public function test_it_can_create_an_restaurant()
    {
        $data = [
            'name'  => $this->faker->name,
            'address' => $this->faker->address,
            'description' => $this->faker->sentence,
        ];

        $this->post('/api/v1/restaurant', $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_get_restaurants()
    {
        $restaurant = factory(Restaurant::class, 3)->create();

        $this->get('/api/v1/restaurant')
            ->assertOk()
            ->assertJsonStructure([[
                    'id',
                    'name',
                    'address',
                    'description',
            ]]);
    }
}