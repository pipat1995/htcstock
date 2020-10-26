<?php

use App\Models\Legal\LegalAgreement;
use Illuminate\Database\Seeder;

class LegalAgreementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agreements = [
            [
                'id' => '1',
                'name' => 'Hire of Work/Service Contract'
            ],
            [
                'id' => '2',
                'name' => 'Purchase Equipment'
            ],
            [
                'id' => '3',
                'name' => 'Purchase Equipment and Installation'
            ],
            [
                'id' => '4',
                'name' => 'Mould'
            ],
            [
                'id' => '5',
                'name' => 'Scrap'
            ],
            [
                'id' => '6',
                'name' => 'Vendor Service Contract'
            ],
            [
                'id' => '7',
                'name' => 'Lease Contract'
            ],
            [
                'id' => '8',
                'name' => 'Project Based Agreement'
            ],
            [
                'id' => '9',
                'name' => 'Advertisement and Marketing Agreement'
            ],
        ];


        foreach ($agreements as $key => $value) {
            LegalAgreement::insert($value);
        }
    }
}
