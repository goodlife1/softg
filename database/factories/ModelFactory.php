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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\models\Book::class, function (Faker\Generator $faker) {
    $id_a = \DB::table('authors')->select('author_id')->inRandomOrder()->limit(1)->get();
    $id_g = \DB::table('genres')->select('genres_id')->inRandomOrder()->limit(1)->get();
    $id_p = \DB::table('publishers')->select('publisher_id')->inRandomOrder()->limit(1)->get();

    return [
        'author_id' => $id_a[0]->author_id,
        'name' => implode(' ',$faker->words),
        'genres_id' => $id_g[0]->genres_id,
        'count_pages' => random_int(100, 1000),
        'publishing_year' => $faker->year,
        'publisher_id' => $id_p[0]->publisher_id,
        'date_of_receipt' => $faker->date()
    ];
});
$factory->define(App\models\Publisher::class, function (Faker\Generator $faker) {
    $id = \DB::table('addresses')->select('address_id')->inRandomOrder()->limit(1)->get();
    return [
        'name'=>$faker->company,
        'address_id'=>$id[0]->address_id,
        'contact_person'=>$faker->name,


    ];
});
$factory->define(App\models\Address::class, function (Faker\Generator $faker) {
    $id = \DB::table('cities')->select('city_id')->inRandomOrder()->limit(1)->get();

    return [
        'city_id' => $id[0]->city_id,
        'street' => $faker->streetName,
        'house' => random_int(1,150),
        'zip_code' => random_int(1000, 999999),
    ];
});

$factory->define(App\models\Author::class, function (Faker\Generator $faker) {
    $id = \DB::table('countries')->select('country_id')->inRandomOrder()->limit(1)->get();

    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'year_of_birth' => $faker->date(),
        'year_death' => $faker->date(),
        'citizenship' => $id[0]->country_id,

    ];

});
