<?php
namespace App\Http\Filters\IT\Query;

class RoleFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('id', [...$value]);
    }
}
