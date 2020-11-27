<?php

namespace App\Http\Filters\IT\Query;

class StartAtFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereDate('created_at','>=', $value);
    }
}
