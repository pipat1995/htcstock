<?php

namespace App\Models\KPI;

use Illuminate\Database\Eloquent\Model;

class EvaluateDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'evaluate_id',
        'target',
        'actual',
        'weight',
        'weight_category',
        'base_line',
        'max_result'
    ];
}
