<?php

use App\Models\IT\Department;
use App\Models\Legal\LegalApproval;
use App\User;
use Illuminate\Database\Seeder;

class ApprovalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LegalApproval::truncate();
        $userF = User::where('email', 'pratchaya.g@haier.co.th')->first();
        $userS = User::where('email', 'eddy.wen@haier.co.th')->first();
        $departments = Department::all();
        $approvals = [];
        foreach ($departments as $key => $value) {
            $itemF = array(
                'levels' => 1,
                'user_id' => $userF->id,
                'department_id' => $value->id,
                'created_at' => now(),
                'updated_at' => now()
            );
            $itemS = array(
                'levels' => 2,
                'user_id' => $userS->id,
                'department_id' => $value->id,
                'created_at' => now(),
                'updated_at' => now()
            );
            array_push($approvals, $itemF);
            array_push($approvals, $itemS);
        }
        LegalApproval::insert($approvals);
    }
}
