<?php

namespace App\Http\Filters\IT\Query;

class UserFilter
{
    public function filter($builder, $value)
    {
        return $builder->orWhere('name', 'like', '%' . $value . '%')
            ->orWhere('username', 'like', '%' . $value . '%')
            ->orWhere('email', 'like', '%' . $value . '%');
    }
}
