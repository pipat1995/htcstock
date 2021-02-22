<?php

use App\Models\KPI\RuleCategory;
use Illuminate\Database\Seeder;

class RuleCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'kpi', 'description' => 'Business Goals - KPI'],
            ['name' => 'key-task', 'description' => 'Business Goals - Key Task'],
            ['name' => 'omg', 'description' => 'Organization Management Goal']
        ];
        foreach ($categories as $key => $value) {
            RuleCategory::firstOrCreate($value);
        }
    }
}
