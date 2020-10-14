<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Restaurant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

        Storage::fake('photos');

        $data = [
            'filename' => $this->faker->title,
            'image' => UploadedFile::fake()->image('image.jpg'),
            'restaurant_id' => $restaurant->id,
        ];

        $response = $this->json('POST', '/api/v1/image', $data);
        // $response = $this->postJson('/api/v1/image', $data);

        $response->dump();
        Storage::disk('photos')->assertExists('image.jpg');
        $response->assertStatus(201)
                 ->assertJson($data);
    }
}
