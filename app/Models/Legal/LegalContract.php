<?php

namespace App\Models\Legal;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LegalContract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status','comment', 'action_id', 'agreement_id', 'company_name', 'company_cer', 'representative', 'representative_cer', 'address',
        'contract_dest_id', 'requestor_by', 'checked_by', 'created_by'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->created_by = auth()->id();
            $query->checked_by = User::where('email', 'pratchaya.g@haier.co.th')->first()->id;
        });
    }

    public function legalAction()
    {
        return $this->belongsTo(legalAction::class, 'action_id');
    }

    public function legalAgreement()
    {
        return $this->belongsTo(LegalAgreement::class, 'agreement_id');
    }

    public function legalContractDest()
    {
        return $this->belongsTo(LegalContractDest::class, 'contract_dest_id');
    }

    public function requestorBy()
    {
        return $this->belongsTo(\App\User::class, 'requestor_by');
    }

    public function checkedBy()
    {
        return $this->belongsTo(\App\User::class, 'checked_by');
    }

    public function createdBy()
    {
        return $this->belongsTo(\App\User::class, 'created_by');
    }

    public function approvalDetail()
    {
        return $this->hasOne(LegalApprovalDetail::class,);
    }
}
