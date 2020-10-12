<?php

use App\Models\IT\Permission;
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
                'id' => '1',
                'name' => 'Create Buy',
                'slug' => 'create-buy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'Edit Buy',
                'slug' => 'edit-buy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'name' => 'Show Buy',
                'slug' => 'show-buy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '4',
                'name' => 'Delete Buy',
                'slug' => 'delete-buy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '5',
                'name' => 'Create Lend',
                'slug' => 'create-lend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '6',
                'name' => 'Edit Lend',
                'slug' => 'edit-lend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '7',
                'name' => 'Show Lend',
                'slug' => 'show-lend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '8',
                'name' => 'Delete Lend',
                'slug' => 'delete-lend',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '9',
                'name' => 'Create Requisition',
                'slug' => 'create-requisition',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '10',
                'name' => 'Edit Requisition',
                'slug' => 'edit-requisition',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '11',
                'name' => 'Show Requisition',
                'slug' => 'show-requisition',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '12',
                'name' => 'Delete Requisition',
                'slug' => 'delete-requisition',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($permissions as $key => $value) {
            Permission::insert($value);
        }
    }
}
