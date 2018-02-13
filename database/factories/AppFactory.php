<?php

$factory->define(App\App::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "description" => $faker->name,
        "configs" => $faker->name,
    ];
});
