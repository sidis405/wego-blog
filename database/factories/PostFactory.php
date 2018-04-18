<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->paragraph,
        'category_id' => factory(App\Category::class)->create()->id,
        'user_id' => factory(App\User::class)->create()->id
    ];
});
