<?php

use App\Models\Legal\LegalAgreement;
use App\Models\Legal\LegalSubtypeContract;
use Illuminate\Database\Seeder;

class LegalSubtypeContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subtypeContract = [
            [
                'id' => '1',
                'name' => 'Bus',
                'slug' => 'bus-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '2',
                'name' => 'Cleaning',
                'slug' => 'cleaning-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '3',
                'name' => 'Cook',
                'slug' => 'cook-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '4',
                'name' => 'Dortor',
                'slug' => 'doctor-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '5',
                'name' => 'Nurse',
                'slug' => 'nurse-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '6',
                'name' => 'Security Guard',
                'slug' => 'security-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '7',
                'name' => 'SubContractor',
                'slug' => 'subcontractor-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '8',
                'name' => 'Transportation',
                'slug' => 'transportation-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '9',
                'name' => 'IT',
                'slug' => 'it-contract',
                'agreement_id' => LegalAgreement::where('name', 'Vendor Service Contract')->first()->id,
            ],
            [
                'id' => '10',
                'name' => 'Forklifts',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '11',
                'name' => 'Traction Battery',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '12',
                'name' => 'Accomodation',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '13',
                'name' => 'Pallet',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '14',
                'name' => 'Printer',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '15',
                'name' => 'Other',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Lease Contract')->first()->id,
            ],
            [
                'id' => '16',
                'name' => 'HR',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Project Based Agreement')->first()->id,
            ],
            [
                'id' => '17',
                'name' => 'Loan',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Project Based Agreement')->first()->id,
            ],
            [
                'id' => '18',
                'name' => 'RF',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Project Based Agreement')->first()->id,
            ],
            [
                'id' => '19',
                'name' => 'Sale',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Project Based Agreement')->first()->id,
            ],
            [
                'id' => '20',
                'name' => 'SCM',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Project Based Agreement')->first()->id,
            ],
            [
                'id' => '21',
                'name' => 'WAC',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Project Based Agreement')->first()->id,
            ],
            [
                'id' => '22',
                'name' => 'Receiving the money',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Advertisement and Marketing Agreement')->first()->id,
            ],
            [
                'id' => '23',
                'name' => 'Transfering the money',
                'slug' => null,
                'agreement_id' => LegalAgreement::where('name', 'Advertisement and Marketing Agreement')->first()->id,
            ],
        ];


        foreach ($subtypeContract as $key => $value) {
            LegalSubtypeContract::insert($value);
        }
    }
}
