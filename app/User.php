<?php

namespace App;

use App\Models\IT\Department;
use App\Models\IT\Transactions;
use App\Models\Legal\LegalContract;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,HasPermissionsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'department_id', 'locale'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transactions::class, 'trans_by');
    }

    public function createdTransaction()
    {
        return $this->belongsTo(Transactions::class, 'created_by');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Legal
    public function requestorContract()
    {
        return $this->hasMany(LegalContract::class);
    }

    public function checkedContract()
    {
        return $this->hasMany(LegalContract::class);
    }

    public function createdContract()
    {
        return $this->hasMany(LegalContract::class);
    }
}
