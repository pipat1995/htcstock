<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::where('slug', 'super-admin')->first();
        $authorRole = Role::where('slug', 'admin')->first();
        $userRole = Role::where('slug', 'user')->first();
        $a = Permission::where('slug','create-buy')->first();
        $b = Permission::where('slug','edit-buy')->first();
        $c = Permission::where('slug','show-buy')->first();
        $d = Permission::where('slug','delete-buy')->first();
        $response = Http::get(ENV('USERS_INFO'));
        foreach ($response->json() as $key => $value) {
            $user = User::create([
                'name' => $value['name'],
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => Hash::make(strtolower(substr($value['email'], 0, 1)) . $value['username']),
            ]);
            if ($user->username === "70037539") {
                
                $user->roles()->attach($adminRole);
                $user->roles()->attach($authorRole);
                $user->roles()->attach($userRole);
                $user->permissions()->attach($a);
                $user->permissions()->attach($b);
                $user->permissions()->attach($c);
                $user->permissions()->attach($d);
            } else {
                $user->roles()->attach($userRole);
            }
            
        }
    }
}
