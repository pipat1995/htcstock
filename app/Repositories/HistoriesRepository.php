<?php

namespace App\Repositories;

use App\Histories;
use App\Repositories\Interfaces\HistoriesRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoriesRepository implements HistoriesRepositoryInterface
{
    public function allTake()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status',$enums->TAKE)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function allLend()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            return Histories::where('status',$enums->LEND)->get();
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
    public function storeTake($var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->validationAccess,
                'qty' => $var->validationQty,
                'user_take' => $var->validationTakeName,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.TAKE')
            ]);
            $histories->save();
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeLend($var)
    {
        try {
            $histories = Histories::firstOrNew([
                'access_id' => $var->validationAccess,
                'qty' => $var->validationQty,
                'user_take' => $var->validationTakeName,
                'create_by' => (int) Auth::user()->id,
                'status' => \config('enums.histories_types.LEND')
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
            $histories->name = $var->name;
            $histories->unit = $var->unit;
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
