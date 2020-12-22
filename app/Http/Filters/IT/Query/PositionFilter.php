<?php
namespace App\Http\Filters\IT\Query;

class PositionFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('positions', function ($q) use($value){
            $q->whereIn('positions.id',[...$value]); // or whatever constraint you need here
          });
    }
}
