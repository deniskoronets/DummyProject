<?php

use Faker\Generator as Faker;

$browsers = [
    'Firefox',
    'Chrome',
    'Chromium',
    'Opera',
    'Edge',
];

$oss = [
    'Windows XP',
    'Windows 7',
    'Windows 10',
    'Ubuntu',
    'Other Linux',
    'Mac OS',
];

$factory->define(\App\Models\Visit::class, function (Faker $faker) use ($browsers, $oss) {
    return [
        'browser' => $browsers[array_rand($browsers)],
        'os' => $oss[array_rand($oss)],
        'country' => $faker->country,
        'ip' => $faker->ipv4,
        'visited_at' => $faker->dateTimeBetween('-5 days', 'now'),
    ];
});
