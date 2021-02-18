<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KPI\EvaluateDetail;
use App\Models\KPI\Evaluate;
use Faker\Generator as Faker;

$eval = Evaluate::all('id');
$factory->define(EvaluateDetail::class, function (Faker $faker) use ($eval) {
    return [
        'evaluate_id' => $faker->randomElement($eval),
        'target' => $faker->randomFloat(9999999999999, 0, 9999999999999),
        'actual' => $faker->randomFloat(9999999999999, 0, 9999999999999),
        'weight' => $faker->randomFloat(99999, 0, 99999),
        'weight_category' => $faker->randomFloat(99999, 0, 99999),
        'base_line' => $faker->randomFloat(9999999999999, 0, 9999999999999),
        'max_result' => $faker->randomFloat(9999999999999, 0, 9999999999999)
    ];
});
