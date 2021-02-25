<?php

namespace App\Models\KPI;

use App\Http\Filters\KPI\TemplateFilter;
use App\Models\Department;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'kpi_templates';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'department_id'
    ];

    // service เรียกใช้ Filter
    public function scopeFilter(Builder $builder, $request)
    {
        return (new TemplateFilter($request))->filter($builder);
    }

    public function category()
    {
        return $this->hasOne(RuleCategory::class)->withDefault();
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withDefault();
    }
}
