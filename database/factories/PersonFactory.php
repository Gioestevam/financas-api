<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'age' => $faker->numberBetween(15, 50),
        'genre' => $faker->randomElement(array('F', 'M')),
        'cpf' => $faker->numberBetween(000000000000000, 99999999999999),
        'user_id' => $faker->unique()->numberBetween(1, App\User::count())
    ];
});
