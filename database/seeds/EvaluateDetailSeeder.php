<?php

use App\Models\KPI\EvaluateDetail;
use Illuminate\Database\Seeder;

class EvaluateDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EvaluateDetail::class,10)->create();
    }
}
