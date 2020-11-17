<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Restaurant::class, 10)
            ->create()
            ->each(function ($restaurant) {
                factory(Image::class, 5)
                    ->create([
                        'restaurant_id' => $restaurant->id
                    ]);
            });
    }
}
