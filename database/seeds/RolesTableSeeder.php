<?php

use App\Models\Role;
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
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                
            ],
            [
                'name' => 'Admin Legal',
                'slug' => 'admin-legal',
                
            ],
            [
                'name' => 'User Legal',
                'slug' => 'user-legal',
                
            ],
        ];

        foreach ($roles as $key => $value) {
            Role::firstOrCreate($value);
        }
    }
}
