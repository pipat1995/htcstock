<?php

namespace App\Models\KPI;

use App\Http\Filters\KPI\RuleFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'kpi_rules';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'measurement',
        'target_unit_id'
    ];

    public function category()
    {
        return $this->belongsTo(RuleCategory::class, 'category_id')->withDefault();
    }

    public function targetUnit()
    {
        return $this->belongsTo(TargetUnit::class, 'target_unit_id')->withDefault();
    }
    // service เรียกใช้ Filter
    public function scopeFilter(Builder $builder, $request)
    {
        return (new RuleFilter($request))->filter($builder);
    }
}
