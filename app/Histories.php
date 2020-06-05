<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Histories extends Model
{
    protected $table = 'histories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'access_id', 'qty', 'user_take','user_lend', 'create_by','status'
    ];

    /**
     * format for dataTable Frontend
     *
     * @var array
     */
    // public function format()
    // {
    //     return [
    //         'action'=> '<botton class="edit btn btn-primary btn-sm" data-toggle="modal" data-target="#takeModal" data-param="' . $this->id . '">ข้อมูล</botton>',
    //         'id' => $this->id,
    //         'accessories' => $this->accessories,
    //         'qty' => $this->qty,
    //         'user_take' => $this->user_take,
    //         'updated' => $this->updated_at
    //     ];
    // }

    // public static function takeList()
    // {
    //     try {
    //         $enums = (object) \config('enums.histories_types');
    //         $sql = 'SELECT h.id,a.name as accessories,h.qty,h.user_take,u.name,h.status as users FROM `histories` h LEFT JOIN `users` u ON h.create_by = u.id LEFT JOIN `accessories` a ON h.access_id = a.id WHERE h.status IN ("' . $enums->TAKE . '")';
    //         // \dd($sql);
    //         $users = User::userinfo();
    //         $histories = DB::select($sql);
    //         foreach ($histories as $key => $value) {
    //             array_filter($users, function ($var) use ($value) {
    //                 if (($var->id == $value->user_take)) {
    //                     return $value->user_take = $var->name;
    //                 }
    //             });
    //         }
    //         return $histories;
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

    public function accessorie()
    {
        return $this->belongsTo(\App\Accessories::class,'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class,'id');
    }
}
