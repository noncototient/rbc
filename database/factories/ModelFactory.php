<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->tollFreePhoneNumber,
        'email' => $faker->email,

        'card_number' => $faker->creditCardNumber,
        'exp_date' => $faker->creditCardExpirationDateString,
        'cvc' => $faker->numberBetween(100, 999),

        'street' => $faker->streetAddress,
        'suburb' => $faker->state,
        'city' => $faker->city,
        'zip' => $faker->postcode,
    ];
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph($nb = 3, $asText = false),
        'price' => $faker->randomNumber(2)
    ];
});
