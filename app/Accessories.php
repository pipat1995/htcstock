<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table = 'accessories';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'unit'
    ];

    public function historie()
    {
        return $this->belongsTo(\App\Histories::class,'access_id');
    }
}
