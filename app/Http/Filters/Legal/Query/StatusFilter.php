<?php
namespace App\Http\Filters\Legal\Query;

class StatusFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('status', [...$value]);
    }
}
