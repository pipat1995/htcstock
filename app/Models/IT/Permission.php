<?php

namespace App\Models\IT;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function roles() {

        return $this->belongsToMany(Role::class,'role_permission');
            
     }
     
     public function users() {
     
        return $this->belongsToMany(User::class,'user_permission');
            
     }
}
