<?php

namespace App\Http\Filters\IT\Query;

class IrFilter
{
    public function filter($builder, $value)
    {
        return $builder->Where('ir_no', $value);
    }
}
