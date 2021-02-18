<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KPI\RuleCategory;
use App\Models\KPI\TargetUnit;
use App\Models\KPI\Rule;
use Faker\Generator as Faker;

$categoryrs = RuleCategory::all('id');
$units = TargetUnit::all('id');
$factory->define(Rule::class, function (Faker $faker) use ($categoryrs, $units) {
    return [
        'name' => $faker->name,
        'category_id' => $faker->randomElement($categoryrs),
        'description' => $faker->text(200),
        'measurement' => $faker->text(50),
        'target_unit_id' => $faker->randomElement($units)
    ];
});