<?php

use App\Models\System;
use App\Models\User;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systems = [
            [
                'name' => 'IT Stock',
                'slug' => 'it',
                'icon' => 'fa fa-dropbox fa-5x'
            ],
            [
                'name' => 'Contract Legal',
                'slug' => 'legal',
                'icon' => 'fa fa-gavel fa-5x'
            ]
        ];

        foreach ($systems as $key => $value) {
            System::firstOrCreate($value);
        }
        $it = System::where('slug','it')->first();
        $user = User::where('username','70037539')->first();
        $author = User::where('username','70002172')->first();
        $user->systems()->attach($it);
        $author->systems()->attach($it);
    }
}
