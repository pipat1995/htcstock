<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Department;
use App\Models\KPI\Template;
use Faker\Generator as Faker;

$department = Department::all('id');
$templates = [
    'Marketing.',
    'Sales.',
    'Social Media.',
    'Financial.',
    'Supply Chain.',
    'Call Center.',
    'Healthcare.',
    'Human Resource.'
];
$factory->define(Template::class, function (Faker $faker) use ($department,$templates) {
    return [
        'name' => $faker->randomElement($templates),
        'department_id' => $faker->randomElement($department)
    ];
});
