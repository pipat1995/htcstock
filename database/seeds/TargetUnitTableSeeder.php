<?php

use App\Models\KPI\TargetUnit;
use Illuminate\Database\Seeder;

class TargetUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TargetUnit::class,10)->create();
    }
}
