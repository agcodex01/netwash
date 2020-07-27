<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\User;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    $gender = ['Male','Female'];

    $customer = factory(User::class)->create([
        'role' => 3
    ]);

    $customer->userProfile()->create([
        'name' => $faker->name,
        'gender' => $gender[rand(0,1)],
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber

    ]);

    

    return [
        'user_id' => $customer
    ];
});
