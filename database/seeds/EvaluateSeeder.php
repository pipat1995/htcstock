<?php

use App\Models\KPI\Evaluate;
use Illuminate\Database\Seeder;

class EvaluateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Evaluate::class,10)->create();
    }
}
