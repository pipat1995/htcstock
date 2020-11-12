<?php
namespace App\Http\Filters\IT\Query;

class UserRoleFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('roles', function ($q) use($value){
            $q->whereIn('roles.id',[...$value]); // or whatever constraint you need here
          });
    }
}
