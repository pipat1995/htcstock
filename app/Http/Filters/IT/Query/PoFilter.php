<?php

namespace App\Http\Filters\IT\Query;

class PoFilter
{
    public function filter($builder, $value)
    {
        return $builder->Where('po_no', $value);
    }
}
