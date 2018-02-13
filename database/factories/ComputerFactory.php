<?php

$factory->define(App\Computer::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "mac" => $faker->name,
        "os" => $faker->name,
        "owner" => $faker->name,
        "location_id" => factory('App\Location')->create(),
        "details" => $faker->name,
        "status" => collect(["Active","Broken","Service",])->random(),
    ];
});
