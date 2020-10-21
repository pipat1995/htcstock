<?php

namespace App\Models\Legal;

use Illuminate\Database\Eloquent\Model;

class LegalAgreement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function legalcontract()
    {
        return $this->hasMany(LegalContract::class);
    }
}
