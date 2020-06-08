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

    public function accessorie()
    {
        return $this->belongsTo(\App\Accessories::class,'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class,'id');
    }
}
