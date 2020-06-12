<?php

namespace App\Repositories;

use App\Histories;
use App\Repositories\Interfaces\LendRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class LendRepository implements LendRepositoryInterface
{
    public function all()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status', $enums->LEND)->orderBy('created_at', 'desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $histories = Histories::find($id);
            $histories->created_at = date('Y-m-d', strtotime($histories->created_at));
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store($var)
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

    public function lendReturn($var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->access_id,
                'qty' => $var->qty,
                'user_lend' => $var->user_lend,
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

    public function update($var, $id)
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

    public function delete($id)
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
