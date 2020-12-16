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
                
            ]
        ];

        foreach ($permissions as $key => $value) {
            Permission::firstOrCreate($value);
        }
    }
}
