<?php
namespace App\Http\Filters\KPI\Query;

class NameLike
{
    public function filter($builder, $value)
    {
        return $builder->where('name','LIKE', '%'.$value.'%');
    }
}
