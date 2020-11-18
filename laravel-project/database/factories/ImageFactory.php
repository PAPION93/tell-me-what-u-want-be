<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Restaurant;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = UploadedFile::fake()->image('image.png');
        $path = $file->store('public');
        return [
            'restaurant_id' => function () {
                return Restaurant::factory()->create()->id;
            },
            'url' => $path,
            'hash_name' => $file->hashName(),
            'original_name' => $file->getClientOriginalName(),
        ];
    }
}
