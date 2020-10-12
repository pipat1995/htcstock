<?php

use App\Models\IT\Permission;
use App\Models\IT\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1',
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'name' => 'Admin',
                'slug' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '3',
                'name' => 'User',
                'slug' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($roles as $key => $value) {
            Role::insert($value);
        }
    }
}
