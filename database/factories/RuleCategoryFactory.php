<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KPI\RuleCategory;
use Faker\Generator as Faker;

$categorys = [
    'Customer Acquisition Costs.',
    'Customer Lifetime Value.',
    'Sales Target.',
    'Operating Expenses Ratio.',
    'Net Profit Margin Percentage.',
    'Return on Assets.',
    'Return on Equity.',
    'P/E Ratio.'
];
$factory->define(RuleCategory::class, function (Faker $faker) use ($categorys) {
    return [
        'name' => $faker->randomElement($categorys)
    ];
});
