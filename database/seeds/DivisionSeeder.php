<?php

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = [
            ['name' => 'President'],
            ['name' => 'Human Resource & General Admin'],
            ['name' => 'Finance & Accounting'],
            ['name' => 'Strategy & Operation'],
            ['name' => 'Marketing'],
            ['name' => 'Supply Chain Management'],
            ['name' => 'Utility'],
            ['name' => 'Support Platform RF'],
            ['name' => 'RF Haier'],
            ['name' => 'RF AQUA'],
            ['name' => 'Production Platform RF'],
            ['name' => 'Technical Platform RF'],
            ['name' => 'Support Platform AC'],
            ['name' => 'SAC'],
            ['name' => 'Production Platform AC'],
            ['name' => 'Technical Platform AC'],
            ['name' => 'WAC']
        ];

        foreach ($division as $key => $value) {
            Division::firstOrCreate($value);
        }
    }
}
