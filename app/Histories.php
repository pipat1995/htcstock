<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Histories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_id', 'qty', 'user_take', 'create_by',
    ];

    public static function takeList()
    {
        try {
            $enums = (object) \config('enums.histories_types');
            $sql = 'SELECT h.id,a.name as accessories,h.qty,h.user_take,u.name,h.status as users FROM `histories` h LEFT JOIN `users` u ON h.create_by = u.id LEFT JOIN `accessories` a ON h.access_id = a.id WHERE h.status IN ("' . $enums->TAKE . '")';
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
}
