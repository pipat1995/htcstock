<?php

use App\Models\Legal\LegalPaymentType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AccessoriesTableSeeder::class,
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            // UsersTableSeeder::class,
            
            // LegalActionTableSeeder::class,
            // LegalAgreementTableSeeder::class,
            // LegalSubtypeContractTableSeeder::class,
            // LegalPaymentType::class

        ]);
    }
}
