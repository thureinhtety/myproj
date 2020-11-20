<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'profile' => $faker->imageUrl($width = 640, $height = 480),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'create_user_id'=>rand(1,5),
        'updated_user_id'=>rand(1,5),
    ];
});
