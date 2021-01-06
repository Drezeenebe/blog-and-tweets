<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentary;
use Faker\Generator as Faker;

$factory->define(Comentary::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence(),
        'user_id' => 1,
        'entry_id' => 1,
    ];
});
