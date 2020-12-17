<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
   public function roles()
   {

      return $this->belongsToMany(Role::class, 'role_permission', 'permission_id');
   }

   public function users()
   {

      return $this->belongsToMany(User::class, 'user_permission');
   }
}
