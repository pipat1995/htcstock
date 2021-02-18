<?php

use App\Models\KPI\TargetPeriod;
use Illuminate\Database\Seeder;

class TargetPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TargetPeriod::class,10)->create();
    }
}
