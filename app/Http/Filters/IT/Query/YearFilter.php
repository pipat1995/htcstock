<?php

namespace App\Http\Filters\IT\Query;

class YearFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereYear('created_at', $value);
    }
}
