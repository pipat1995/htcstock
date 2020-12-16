<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'Create Buy',
                'slug' => 'create-buy',
                
            ],
            [
                'name' => 'Edit Buy',
                'slug' => 'edit-buy',
                
            ],
            [
                'name' => 'Show Buy',
                'slug' => 'show-buy',
                
            ],
            [
                'name' => 'Delete Buy',
                'slug' => 'delete-buy',
                
            ],
            [
                'name' => 'Create Lend',
                'slug' => 'create-lend',
                
            ],
            [
                'name' => 'Edit Lend',
                'slug' => 'edit-lend',
                
            ],
            [
                'name' => 'Show Lend',
                'slug' => 'show-lend',
                
            ],
            [
                'name' => 'Delete Lend',
                'slug' => 'delete-lend',
                
            ],
            [
                'name' => 'Create Requisition',
                'slug' => 'create-requisition',
                
            ],
            [
                'name' => 'Edit Requisition',
                'slug' => 'edit-requisition',
                
            ],
            [
                'name' => 'Show Requisition',
                'slug' => 'show-requisition',
                
            ],
            [
                'name' => 'Delete Requisition',
                'slug' => 'delete-requisition',
                
            ],
// ------------------------------ Legal --------------------------------
            [
                'name' => 'Create Legal Contract',
                'slug' => 'create-legal-contract',
                
            ],
            [
                'name' => 'Edit Legal Contract',
                'slug' => 'edit-legal-contract',
                
            ],
            [
                'name' => 'Show Legal Contract',
                'slug' => 'show-legal-contract',
                
            ],
            [
                'name' => 'Delete Legal Contract',
                'slug' => 'delete-legal-contract',
                
            ],

            [
                'name' => 'Create Legal Contract Destcription',
                'slug' => 'create-legal-contract-destcription',
                
            ],
            [
                'name' => 'Edit Legal Contract Destcription',
                'slug' => 'edit-legal-contract-destcription',
                
            ],
            [
                'name' => 'Show Legal Contract Destcription',
                'slug' => 'show-legal-contract-destcription',
                
            ],
            [
                'name' => 'Delete Legal Contract Destcription',
                'slug' => 'delete-legal-contract-destcription',
                
            ],

            [
                'name' => 'Create Legal Comercial Terms',
                'slug' => 'create-legal-comercial-terms',
                
            ],
            [
                'name' => 'Edit Legal Comercial Terms',
                'slug' => 'edit-legal-comercial-terms',
                
            ],
            [
                'name' => 'Show Legal Comercial Terms',
                'slug' => 'show-legal-comercial-terms',
                
            ],
            [
                'name' => 'Delete Legal Comercial Terms',
                'slug' => 'delete-legal-comercial-terms',
                
            ],

            [
                'name' => 'Create Legal Comercial Lists',
                'slug' => 'create-legal-comercial-lists',
                
            ],
            [
                'name' => 'Edit Legal Comercial Lists',
                'slug' => 'edit-legal-comercial-lists',
                
            ],
            [
                'name' => 'Show Legal Comercial Lists',
                'slug' => 'show-legal-comercial-lists',
                
            ],
            [
                'name' => 'Delete Legal Comercial Lists',
                'slug' => 'delete-legal-comercial-lists',
                
            ],

            [
                'name' => 'Create Legal Payment Terms',
                'slug' => 'create-legal-payment-terms',
                
            ],
            [
                'name' => 'Edit Legal Payment Terms',
                'slug' => 'edit-legal-payment-terms',
                
            ],
            [
                'name' => 'Show Legal Payment Terms',
                'slug' => 'show-legal-payment-terms',
                
            ],
            [
                'name' => 'Delete Legal Payment Terms',
                'slug' => 'delete-legal-payment-terms',
                
            ],
        ];

        foreach ($permissions as $key => $value) {
            Permission::firstOrCreate($value);
        }
    }
}
