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
            $sql = 'SELECT h.id,a.name as accessories,h.qty,h.user_take,u.name,h.status as users FROM `histories` h LEFT JOIN `users` u ON h.create_by = u.id LEFT JOIN `accessories` a ON h.access_id = a.id WHERE h.status IN ("' . $enums->TAKE . '")';
            // \dd($sql);
            $users = User::userinfo();
            $histories = new Histories(DB::select($sql));
            
            // $histories = DB::select($sql);
            foreach ($histories->all() as $key => $value) {
                array_filter($users, function ($var) use ($value) {
                    if (($var->id == $value->user_take)) {
                        return $value->user_take = $var->name;
                    }
                });
            }
            // \dd($histories->first());
            
            return $histories->all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function allLend()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            $sql = 'SELECT h.id,a.name as accessories,h.qty,h.user_take,u.name,h.status as users FROM `histories` h LEFT JOIN `users` u ON h.create_by = u.id LEFT JOIN `accessories` a ON h.access_id = a.id WHERE h.status IN ("' . $enums->LEND . '")';
            // \dd($sql);
            $users = User::userinfo();
            $histories = DB::select($sql);
            foreach ($histories as $key => $value) {
                array_filter($users, function ($var) use ($value) {
                    if (($var->id == $value->user_take)) {
                        return $value->user_take = $var->name;
                    }
                });
            }
            return $histories;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function findById($id)
    {
        try {
            return Histories::where('id', $id)->firstOrFail();
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
