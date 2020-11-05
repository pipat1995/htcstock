<?php

namespace App\Models\IT;

use App\Models\Legal\LegalApproval;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    public function users()
    {
        return $this->hasMany(\App\User::class, 'department_id');
    }
    public function legalApprove()
    {
        return $this->hasMany(LegalApproval::class);
    }
}
