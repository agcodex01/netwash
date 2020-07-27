<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use App\User;
use Faker\Generator as Faker;

$factory->define(Partner::class, function (Faker $faker) {
    $gender = ['Male','Female'];

    $partner = factory(User::class)->create([
        'role' => 2
    ]);

    $partner->userProfile()->create([
        'name' => $faker->name,
        'gender' => $gender[rand(0,1)],
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber
    ]);

    return [
        'user_id' => $partner
    ];
});
