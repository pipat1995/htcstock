<?php

use App\Models\Legal\LegalAgreement;
use App\Models\Legal\LegalPaymentType;
use Illuminate\Database\Seeder;

class LegalPaymentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentTypes = [
            [
                'id' => '1',
                'name' => 'KBF',
                'agreement_id' => LegalAgreement::where('name', 'Hire of Work/Service Contract')->first()->id,
            ],
            [
                'id' => '2',
                'name' => 'MC&E',
                'agreement_id' => LegalAgreement::where('name', 'Hire of Work/Service Contract')->first()->id,
            ],
            [
                'id' => '3',
                'name' => 'PC',
                'agreement_id' => LegalAgreement::where('name', 'Purchase Equipment')->first()->id,
            ],
            [
                'id' => '4',
                'name' => 'PI',
                'agreement_id' => LegalAgreement::where('name', 'Purchase Equipment and Installation')->first()->id,
            ],
            [
                'id' => '5',
                'name' => 'PM',
                'agreement_id' => LegalAgreement::where('name', 'Mould')->first()->id,
            ],
            [
                'id' => '6',
                'name' => 'P.MM',
                'agreement_id' => LegalAgreement::where('name', 'Mould')->first()->id,
            ],
            [
                'id' => '7',
                'name' => 'Scrap',
                'agreement_id' => LegalAgreement::where('name', 'Scrap')->first()->id,
            ],
            [
                'id' => '8',
                'name' => 'Monthly',
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '9',
                'name' => 'Other',
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
        ];


        foreach ($paymentTypes as $key => $value) {
            LegalPaymentType::insert($value);
        }
    }
}
