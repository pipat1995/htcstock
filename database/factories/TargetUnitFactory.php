<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KPI\TargetUnit;
use Faker\Generator as Faker;

$units = ['kB', 'MB', 'GB', 'TB'];
$factory->define(TargetUnit::class, function (Faker $faker) use ($units) {
    return [
        'name' => $faker->randomElement($units)
    ];
});
