<?php

use App\Models\IT\Permission;
use App\Models\IT\Role;
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
        // $response = Http::get(ENV('USERS_INFO'));

        $per = Permission::all();
        foreach ($per as $key => $value) {
            if (substr($value->slug,0,6) === 'delete') {
                $adminRole->permissions()->attach($value);
            }else{
                $adminRole->permissions()->attach($value);
                $authorRole->permissions()->attach($value);
                $userRole->permissions()->attach($value);
            }
        }
        $users = User::all();
        foreach ($users as $key => $item) {
            if ($item->email === 'Pipat.p@haier.co.th') {
                $item->roles()->attach($adminRole);
                $item->roles()->attach($authorRole);
            }
            if ($item->email === 'tanapat.k@haier.co.th') {
                $item->roles()->attach($authorRole);
            }
            $item->roles()->attach($userRole);
        }
    }
}
