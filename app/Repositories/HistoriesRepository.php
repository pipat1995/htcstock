<?php

namespace App\Repositories;

use App\Histories;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HistoriesRepository implements HistoriesRepositoryInterface
{
    public function allTake()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status', $enums->TAKE)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function allLend()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status', $enums->LEND)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function findById($id)
    {
        try {
            $histories = Histories::where('id', $id)->firstOrFail();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function store($var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->validationAccess,
                'qty' => $var->validationQty,
                'user_take' => $var->validationTakeName,
                'user_lend' => $var->validationLendName,
                'create_by' => (int) Auth::user()->id,
                'status' => $var->status
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
            $histories = Histories::where('id', $id)->firstOrFail();
            $histories->access_id = $var->validationAccess;
            $histories->qty = $var->validationQty;
            $histories->user_take = $var->validationTakeName;
            $histories->status = $var->status;
            $histories->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $histories = Histories::where('id', $id)->firstOrFail();
            $histories->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
