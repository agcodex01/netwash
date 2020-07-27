<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Staff;
use App\User;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    $gender = ['Male','Female'];

    $staff = factory(User::class)->create([
        'role' => 4
    ]);

    $staff->userProfile()->create([
        'name' => $faker->name,
        'gender' => $gender[rand(0,1)],
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber

    ]);

    return [
        'user_id' => $staff,
        'position_id' => 1,
        'branch_id' => 1,  
    ];
});
