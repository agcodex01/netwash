<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Laundry;
use App\Partner;
use Faker\Generator as Faker;

$factory->define(Laundry::class, function (Faker $faker) {
  
    
    return [
        'partner_id' => factory(Partner::class)->create(),
        
    ];
});
