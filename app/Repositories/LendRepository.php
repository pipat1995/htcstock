<?php

namespace App\Repositories;

use App\Histories;
use App\Repositories\Interfaces\LendRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LendRepository implements LendRepositoryInterface
{
    public function all()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            $histories = Histories::where('status', $enums->LEND)->orderBy('created_at', 'desc')->get();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(String $id)
    {
        try {
            $histories = Histories::find($id);
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->access_id,
                'qty' => $var->qty,
                'user_lending' => $var->user_lending,
                'remark' => $var->remark,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.LEND')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function lendReturn(Histories $var, String $userReturned)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->access_id,
                'qty' => $var->qty,
                'user_lending' => $var->user_lending,
                'user_returned' => $userReturned,
                'remark' => $var->remark,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.BACK')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Histories $var, String $id)
    {
        try {
            $histories = Histories::find($id);
            $histories->user_lend = $var->user_lend;
            $histories->status = \config('enums.histories_types.BACK');
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(String $id)
    {
        try {
            $histories = Histories::find($id);
            $histories->delete();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
