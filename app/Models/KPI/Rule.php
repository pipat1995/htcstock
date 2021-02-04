<?php

namespace App\Models\KPI;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_code',
        'description',
        'measurement',
        'target_unit_code'
    ];
}
