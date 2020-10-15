<?php

namespace App\Models\Legal;

use Illuminate\Database\Eloquent\Model;

class LegalComercialList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description','unit_price','discount','amount','road','building','toilet',
        'canteen','washing','water','mowing','general','contract_dests_id'
    ];
}
