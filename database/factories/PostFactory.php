<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'preview' => $faker->paragraph,
        'body' => join(' ', $faker->paragraphs(16)),
        'category_id' => factory(App\Category::class)->make(),
        'user_id' => factory(App\User::class)->make(),
    ];
});
