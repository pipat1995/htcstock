<?php

use App\Models\KPI\Rule;
use App\Models\KPI\RuleCategory;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Rule::class, 10)->create();
        $kpi = RuleCategory::where('name', 'kpi')->first()->id;
        $omg = RuleCategory::where('name', 'omg')->first()->id;
        // $key_task = RuleCategory::where('name', 'key-task')->id;
        $rules = [
            ['name' => 'Revenue', 'category_id' => $kpi],
            ['name' => 'RM Margin', 'category_id' => $kpi],
            ['name' => 'FG Delivery on time', 'category_id' => $kpi],
            ['name' => 'RM Delivery on time', 'category_id' => $kpi],
            ['name' => 'WH (FG /RM )stock DIFF', 'category_id' => $kpi],
            ['name' => 'Efficiency of per Capita', 'category_id' => $kpi],
            ['name' => 'DIO', 'category_id' => $kpi],
            ['name' => 'Expenses (MFG+R&D)', 'category_id' => $kpi],
            ['name' => 'Production achieve plan', 'category_id' => $kpi],
            ['name' => 'RM Production stop line', 'category_id' => $kpi],
            ['name' => 'Production loss', 'category_id' => $kpi],
            ['name' => 'M/C Breakdown', 'category_id' => $kpi],
            ['name' => 'New model launch on time', 'category_id' => $kpi],
            ['name' => 'FG Aging (FG 60+ inventory)ratio ≤3% (FG 180=0 )', 'category_id' => $kpi],
            ['name' => 'Overdue', 'category_id' => $kpi],
            ['name' => 'Sales Expense', 'category_id' => $kpi],
            ['name' => 'BOM Achievement', 'category_id' => $kpi],
            ['name' => 'DIO RM', 'category_id' => $kpi],
            ['name' => 'Reject rate', 'category_id' => $kpi],
            ['name' => 'Department Expense Control', 'category_id' => $kpi],
            ['name' => 'Import Cost - RF/SAC/WAC', 'category_id' => $kpi],
            ['name' => 'Export Cost - RF/SAC/WAC', 'category_id' => $kpi],
            ['name' => 'Expense Control', 'category_id' => $kpi],
            ['name' => 'CCC', 'category_id' => $kpi],
            ['name' => 'Aging Stock', 'category_id' => $kpi],
            ['name' => 'HR cost Efficiency', 'category_id' => $kpi],
            ['name' => 'Operating expenses', 'category_id' => $kpi],
            ['name' => 'Recruitment on time', 'category_id' => $kpi],
            ['name' => 'Staff efficiency', 'category_id' => $kpi],
            ['name' => 'EMC timely Evaluation', 'category_id' => $kpi],
            ['name' => 'Risk Management', 'category_id' => $kpi],
            ['name' => 'Ontime Services and Quality Compliance', 'category_id' => $kpi],
            ['name' => 'Operations（Zero Break Down，Zero Problem)', 'category_id' => $kpi],
            ['name' => 'Energy Expense control', 'category_id' => $kpi],
            ['name' => 'B Class and Above Employees', 'category_id' => $omg],
            ['name' => 'SOP & Policies implementation', 'category_id' => $omg],
            ['name' => 'Report and Meeting Management', 'category_id' => $omg]
        ];

        foreach ($rules as $key => $value) {
            Rule::firstOrCreate($value);
        }
    }
}
