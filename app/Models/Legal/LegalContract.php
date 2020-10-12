<?php

namespace App\Models\Legal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LegalContract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action_id', 'agreement_id', 'company_name', 'company_cer', 'representative', 'representative_cer', 'address',
        'contract_dest_id', 'requestor_by', 'checked_by', 'created_by'
    ];

    public function legalAction()
    {
        return $this->hasMany(\App\Models\Legal\legalAction::class);
    }

    public function legalAgreement()
    {
        return $this->hasMany(\App\Models\Legal\LegalAgreement::class);
    }

    public function legalContractDest()
    {
        return $this->hasMany(\App\Models\Legal\LegalContractDest::class);
    }

    public function requestorBy()
    {
        return $this->hasMany(\App\User::class);
    }

    public function checkedBy()
    {
        return $this->hasMany(\App\User::class);
    }

    public function createdBy()
    {
        return $this->hasMany(\App\User::class);
    }
}
