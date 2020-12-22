<?php
namespace App\Http\Filters\IT\Query;

class DivisionFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('divisions', function ($q) use($value){
            $q->whereIn('divisions.id',[...$value]); // or whatever constraint you need here
          });
    }
}
