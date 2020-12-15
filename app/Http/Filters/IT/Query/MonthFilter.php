<?php

namespace App\Http\Filters\IT\Query;

class MonthFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereMonth('created_at', $value);
    }
}
