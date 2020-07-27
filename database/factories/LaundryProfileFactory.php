<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LaundryProfile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(LaundryProfile::class, function (Faker $faker) {
    return [
        'laundry_id' => factory(App\Laundry::class)->create(),
        'name' => Str::words(rand(1,2)) .' Laundry',
    ];
});
