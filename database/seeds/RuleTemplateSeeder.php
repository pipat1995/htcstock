<?php

use App\Models\KPI\RuleTemplate;
use Illuminate\Database\Seeder;

class RuleTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RuleTemplate::class,10)->create();
    }
}
