<?php

use Faker\Generator as Faker;

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
        'client_id' => random_int(5,44),
        'phone' => random_int(111111111,999999999),
    ];
});
