<?php

namespace App\Models\IT;

use App\Http\Filters\IT\RoleManagementFilter;
use App\User;
use Illuminate\Database\Eloquent\Builder;
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

   public function scopeFilter(Builder $builder, $request)
   {
       return (new RoleManagementFilter($request))->filter($builder);
   }
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
