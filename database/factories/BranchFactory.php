<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use App\Laundry;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Branch::class, function (Faker $faker) {
    $laundry = factory(Laundry::class)->create();
    $laundry->laundryProfile()->create([
        'name' => $faker->company .' Laundry',
    ]);
    return [
        'laundry_id' =>$laundry,
        'city' => $faker->city,
        'street' => $faker->streetAddress
    ];
});
