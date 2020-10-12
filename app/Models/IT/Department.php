<?php

namespace App\Models\IT;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public function users()
    {
        return $this->hasMany(\App\User::class,'department_id');
    }
}
