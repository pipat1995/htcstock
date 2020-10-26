<?php

use App\Models\Legal\LegalAction;
use Illuminate\Database\Seeder;

class LegalActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action = [
            [
                'id' => '1',
                'name' => 'New contract'
            ]
        ];
        foreach ($action as $key => $value) {
            LegalAction::insert($value);
        }
    }
}
