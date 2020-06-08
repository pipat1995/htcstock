<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user ')->first();
        $admin = User::create([
            'name' => 'Pipat Paonoy',
            'username' => '70037539',
            'email' => 'pipat.p@haier.co.th',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'remember_token' => 'EyGHqSUdIChW1hOnJZfoITkQvOHPD8VdPP6qcBM97k3kM2DCxCJq7scux8oT',
        ]);

        $author = User::create([
            'name' => 'Pipat Paonoy',
            'username' => 'pipat',
            'email' => 'tao.pipat1995@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'remember_token' => 'EyGHqSUdIChW1hOnJZfoITkQvOHPD8VdPP6qcBM97k3kM2DCxCJq7scux8oT',
        ]);

        $user = User::create([
            'name' => 'Pipat Paonoy',
            'username' => 'test',
            'email' => 'test@haier.co.th',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678),
            'remember_token' => 'EyGHqSUdIChW1hOnJZfoITkQvOHPD8VdPP6qcBM97k3kM2DCxCJq7scux8oT',
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
