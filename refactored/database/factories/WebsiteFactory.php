<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Eloquent\Website::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
    ];
});
