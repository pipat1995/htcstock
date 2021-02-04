<?php

namespace App\Models\KPI;

use Illuminate\Database\Eloquent\Model;

class RuleTemplate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'template_id',
        'rule_id',
        'weight',
        'weight_category',
        'parent_rule_template_id',
        'field',
        'target_config',
        'base_line',
        'max_result'
    ];
}
