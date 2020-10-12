<?php

namespace App\Models\IT;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name', 'slug'
   ];

   public function permissions()
   {

      return $this->belongsToMany(Permission::class, 'role_permission');
   }

   public function users()
   {

      return $this->belongsToMany(User::class, 'user_role');
   }

   public function hasPermission($permission)
   {

      return (bool) $this->permissions->where('slug', $permission->slug)->count();
   }
}
