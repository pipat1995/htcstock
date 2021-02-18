<?php

namespace App\Models\KPI;

use App\Http\Filters\KPI\RuleTemplateFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RuleTemplate extends Model
{
    protected $table = 'kpi_rule_templates';
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
    
    // service เรียกใช้ Filter
    public function scopeFilter(Builder $builder, $request)
    {
        return (new RuleTemplateFilter($request))->filter($builder);
    }

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id')->withDefault();
    }
}
