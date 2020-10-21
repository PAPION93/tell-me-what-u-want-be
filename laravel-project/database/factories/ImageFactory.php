<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use App\Models\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Image::class, function (Faker $faker) {
    $file = UploadedFile::fake()->image('image.png');
    $path = $file->store('public');

    return [
        'restaurant_id' => function () {
            return factory(Restaurant::class)->create()->id;
        },
        'url' => $path,
        'hash_name' => $file->hashName(),
        'original_name' => $file->getClientOriginalName(),
    ];
});
