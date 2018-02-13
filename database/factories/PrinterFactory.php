<?php

$factory->define(App\Printer::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "model" => $faker->name,
        "mac" => $faker->name,
        "ip" => $faker->name,
        "location_id" => factory('App\Location')->create(),
    ];
});
