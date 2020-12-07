<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'category' => $this->faker->name,
            'address' => $this->faker->address,
            'google_point' => $this->faker->randomFloat(1, 0, 5),
            'naver_point' => $this->faker->randomFloat(1, 0, 5),
            'dining_point' => $this->faker->randomFloat(1, 0, 5),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
        ];
    }
}
