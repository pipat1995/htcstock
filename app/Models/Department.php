<?php

namespace App\Models;

use App\Models\KPI\Template;
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

    // ITSTOCK
    public function users()
    {
        return $this->hasMany(\App\Models\User::class, 'department_id');
    }


    // Legal
    public function legalApprove()
    {
        return $this->hasMany(LegalApproval::class);
    }

    public function template()
    {
        return $this->hasOne(Template::class)->withDefault();
    }
}
