<?php
namespace App\Http\Filters\IT\Query;

class AccessoriesFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('access_id', [...$value]);
    }
}
