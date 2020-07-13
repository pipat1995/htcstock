<?php

use App\Roles;
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
        User::truncate();
        DB::table('roles_user')->truncate();

        $adminRole = Roles::where('name', 'admin')->first();
        $authorRole = Roles::where('name', 'author')->first();
        $userRole = Roles::where('name', 'user')->first();
        $admin = User::create([
            'name' => 'Admin Pipat',
            'username' => '70037539',
            'email' => 'pipat.p@haier.co.th',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'remember_token' => 'EyGHqSUdIChW1hOnJZfoITkQvOHPD8VdPP6qcBM97k3kM2DCxCJq7scux8oT',
        ]);

        // $author = User::create([
        //     'name' => 'Author Pipat',
        //     'username' => 'pipat',
        //     'email' => 'tao.pipat1995@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make(12345678),
        //     'remember_token' => 'EyGHqSUdIChW1hOnJZfoITkQvOHPD8VdPP6qcBM97k3kM2DCxCJq7scux8oT',
        // ]);

        // $user = User::create([
        //     'name' => 'User Pipat',
        //     'username' => 'test',
        //     'email' => 'test@haier.co.th',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make(12345678),
        //     'remember_token' => 'EyGHqSUdIChW1hOnJZfoITkQvOHPD8VdPP6qcBM97k3kM2DCxCJq7scux8oT',
        // ]);
        $admin->roles()->attach($adminRole);
        $admin->roles()->attach($authorRole);
        $admin->roles()->attach($userRole);

        $response = Http::get(ENV('USERS_INFO'));
        foreach ($response->json() as $key => $value) {
            $user = User::create([
                'name' => $value['name'],
                'username' => $value['username'],
                'email' => $value['email'],
                'password' => Hash::make(strtolower(substr($value['email'], 0, 1)) . $value['username']),
            ]);
            $user->roles()->attach($userRole);
        }
    }
}
