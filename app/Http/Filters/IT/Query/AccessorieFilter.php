<?php
namespace App\Http\Filters\IT\Query;

class AccessorieFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('access_id', $value);
    }
}
