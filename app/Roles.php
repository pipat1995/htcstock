<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function permissions() {

        return $this->belongsToMany(Permission::class,'roles_permissions');
            
     }

    public function users()
    {
        return $this->belongsToMany(User::class,'roles_user');
    }
}
