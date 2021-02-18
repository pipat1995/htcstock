<?php

namespace App\Http\Filters\KPI\Query;

class DeptWhereInForRTemp
{
    public function filter($builder, $value)
    {
        return $builder->orWhere('template_id', function ($q) use ($value) {
            $q->select('id')->from('kpi_templates')->whereIn('department_id',[...$value]);
        });
    }
}
