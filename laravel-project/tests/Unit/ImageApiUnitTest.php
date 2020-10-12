<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Restaurant;

class ImageApiUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_can_create_an_image()
    {
        $restaurant = factory(Restaurant::class)->create();

        $data = [
            'filename' => $this->faker->title,
            'image' => $this->faker->image('public', 360, 240, null, false),
            'restaurant_id' => $restaurant->id,
        ];

        $response = $this->post('/api/v1/image', $data);
        // ->assertStatus(201)
        // ->assertJson($data);
        $response->dump();
    }
}
