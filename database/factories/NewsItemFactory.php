<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'         => $faker->sentence,
        'body'          => $faker->paragraph,
        'description'   => $faker->sentence,
        'published'     => $faker->boolean,
        'slug'          => $faker->unique()->slug,
        'owner_id'      => factory(\App\User::class),
    ];
});
