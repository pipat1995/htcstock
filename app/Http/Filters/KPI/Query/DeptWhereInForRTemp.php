<?php

namespace App\Http\Filters\KPI\Query;

class DeptWhereInForRTemp
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('department_id',[...$value]);
    }
}
