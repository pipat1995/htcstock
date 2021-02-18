<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\KPI\Rule;
use App\Models\KPI\Template;
use App\Models\KPI\RuleTemplate;
use Faker\Generator as Faker;

$templates = Template::all('id');
$rules = Rule::all('id');
$factory->define(RuleTemplate::class, function (Faker $faker) use ($templates, $rules) {
    return [
        'template_id' => $faker->randomElement($templates),
        'rule_id' => $faker->randomElement($rules),
        'weight' => $faker->randomFloat(99999, 0, 99999),
        'weight_category' => $faker->randomFloat(99999, 0, 99999),
        'parent_rule_template_id' => $faker->random_int(1, 9),
        'field' => $faker->randomElement(['Target', 'Actual']),
        'target_config' => $faker->randomFloat(99999, 0, 99999),
        'base_line' => $faker->randomFloat(9999999999999, 0, 9999999999999),
        'max_result' => $faker->randomFloat(9999999999999, 0, 9999999999999)
    ];
});
