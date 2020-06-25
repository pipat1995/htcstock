<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'unit'
    ];

    public function transaction()
    {
        return $this->belongsTo(\App\Transactions::class, 'access_id','access_id');
    }

}
