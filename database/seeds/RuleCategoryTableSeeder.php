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
        factory(RuleCategory::class,10)->create();
    }
}
