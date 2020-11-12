<?php
namespace App\Http\Filters\IT\Query;

class DepartmentFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('department_id', [...$value]);
    }
}
