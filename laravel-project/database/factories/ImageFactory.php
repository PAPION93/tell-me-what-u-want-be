<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use App\Models\Restaurant;
use Illuminate\Http\UploadedFile;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $file = UploadedFile::fake()->image('image.png');
    $path = $file->store('public/storage/images');

    return [
        'restaurant_id' => function () {
            return factory(Restaurant::class)->create()->id;
        },
        'url' => Storage::url($path),
        'hash_name' => $file->hashName(),
        'original_name' => $file->getClientOriginalName(),
    ];
});
