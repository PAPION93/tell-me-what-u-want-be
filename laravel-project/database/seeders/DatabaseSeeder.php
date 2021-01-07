<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
use App\Models\Like;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory()
            ->count(20)
            ->create()
            ->each(function ($restaurant) {
                Image::factory()
                    ->count(5)
                    ->create([
                        'restaurant_id' => $restaurant->id
                    ]);
            });

        User::factory()
            ->count(10)
            ->create()
            ->each(function ($user) {
                Like::factory()
                    ->count(3)
                    ->create([
                        'restaurant_id' => Restaurant::all()->random()->id,
                        'user_id' => User::all()->random()->id,
                    ]);
            });
    }
}
