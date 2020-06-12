<?php

namespace App\Repositories;

use App\Histories;
use App\Repositories\Interfaces\TakeRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TakeRepository implements TakeRepositoryInterface
{
    public function all()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status', $enums->TAKE)->orderBy('created_at','desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit($id)
    {
        try {
            $histories = Histories::find($id);
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
                'user_lending' => $var->user_take,
                'remark' => $var->remark,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.TAKE')
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
            $histories->access_id = $var->access_id;
            $histories->qty = $var->qty;
            $histories->user_take = $var->user_take;
            $histories->remark = $var->remark;
            // $histories->status = $var->status;
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
