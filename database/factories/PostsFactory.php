<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(),
        'description'=>$faker->sentence(),
        'create_user_id'=>rand(1,5),
        'updated_user_id'=>rand(1,5),
    ];
});
