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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'username' => $faker->userName,
        'role_id' => 3,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

//$factory->define(App\Article::class, function (Faker\Generator $faker) {
//    return [
//        'language_id' => rand(1, 3),
//        'user_id' => 1,
//        'article_category_id' => rand(1, 2),
//        'title' => $faker->sentence,
//        'slug' => $faker->slug,
//        'introduction' => $faker->paragraph,
//        'content' => $faker->text,
//        'source' => $faker->url,
//    ];
//});

$factory->define(App\ArticleCategory::class, function (Faker\Generator $faker) {
    return [
        'language_id' => rand(1, 3),
        'user_id' => 1,
        'title' => $faker->sentence,
        'slug' => $faker->slug,
    ];
});

$factory->define(App\Property::class, function (Faker\Generator $faker) {
    return [
        'address1' => $faker->address,
        'address2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip_code' => $faker->postcode
    ];
});

//$factory->define(App\Contact::class, function (Faker\Generator $faker, Faker\Provider\en_US\Address $address) {
//    return [
//        'first_name' => $faker->firstName,
//        'last_name' => $faker->lastName,
//        'phone_number' => $faker->phoneNumber,
//        'address1' => $address->address(),
//        'address2' => $address->secondaryAddress(),
//        'city' => $address->city(),
//        'state' => $address->stateAbbr(),
//        'zip_code' => $address->postcode()
//    ];
//});

$factory->define(App\Contact::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone_number' => $faker->phoneNumber,
        'address1' => $faker->address,
        'address2' => $faker->secondaryAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip_code' => $faker->postcode
    ];
});

$factory->define(\App\Company::class, function(Faker\Generator $faker){
    return [
        'address1' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip_code' => $faker->postcode
    ];
});