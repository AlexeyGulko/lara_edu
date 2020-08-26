<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $commentable = [
        App\Post::class,
        App\News::class,
    ];
    $commentableType = $faker->randomElement($commentable);
    return [
        'body' => $faker->sentence,
        'owner_id' => factory(\App\User::class),
        'commentable_type' => $commentableType,
        'commentable_id' => factory($commentableType)->make()->id,
    ];
});
