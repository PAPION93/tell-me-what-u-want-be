<?php

namespace Tests\Unit;

use Tests\TestCase;

class RestaurantApiUnitTest extends TestCase
{
    public function it_can_create_an_restaurant()
    {
        $data = [
            'name'  => $this->faker->user_name,
            'address' => $this->faker->address,
            'description' => $this->faker->sentence,
        ];

        $this->post(route('restaurants.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
}
