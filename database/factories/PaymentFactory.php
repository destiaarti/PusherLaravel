<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\payment;
use Faker\Generator as Faker;

$factory->define(payment::class, function (Faker $faker) {
    return [
        'payment_name' => $faker->unique()->word(1),
        // $faker->bank
    ];
});
