<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id' => factory(\App\Customer::class)->create(),
        'branch_id' => 1,
        'service' => 'wash and fold',
        'transportation' => 'Walk in',
        'pickup_location' => 'talamban',
        'dropin_location' => 'talamban',
        'kilo' => 5,
        'pickupdate' => '2020-01-10'

    ];
});
