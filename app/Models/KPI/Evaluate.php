<?php

namespace App\Models\KPI;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'period_code',
        'head_id',
        'status',
        'rule_template_id',
        'main_rule_id',
        'main_rule_condition_1_min',
        'main_rule_condition_1_max',
        'main_rule_condition_2_min',
        'main_rule_condition_2_max',
        'main_rule_condition_3_min',
        'main_rule_condition_3_max',
        'total_weight_kpi',
        'total_weight_key_task',
        'total_weight_key_omg'
    ];
}
