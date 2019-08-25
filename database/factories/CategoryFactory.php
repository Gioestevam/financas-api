<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'description' => $faker->name,
        'due_date' => $faker->dateTime('now', 'America/maceio'),
        'type_category' => $faker->randomElement(array('R', 'D'))
    ];
});
