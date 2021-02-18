<?php
namespace App\Http\Filters\KPI\Query;

class CategoryWhereIn
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('category_id', [...$value]);
    }
}
