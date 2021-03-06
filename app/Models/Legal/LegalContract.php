<?php

namespace App\Models\Legal;

use App\Http\Filters\Legal\ContractRequestFilter;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LegalContract extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'comment', 'action_id', 'agreement_id', 'company_name', 'company_cer', 'representative', 'representative_cer', 'address',
        'contract_dest_id', 'requestor_by', 'checked_by', 'created_by', 'trash'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->created_by = auth()->id();
            $query->checked_by = User::where('email', 'pratchaya.g@haier.co.th')->first()->id;
        });
    }

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ContractRequestFilter($request))->filter($builder);
    }

    public function legalAction()
    {
        return $this->belongsTo(legalAction::class, 'action_id')->withDefault();
    }

    public function legalAgreement()
    {
        return $this->belongsTo(LegalAgreement::class, 'agreement_id')->withDefault();
    }

    public function legalContractDest()
    {
        return $this->belongsTo(LegalContractDest::class, 'contract_dest_id')->withDefault();
    }

    public function requestorBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'requestor_by')->withDefault();
    }

    public function checkedBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'checked_by')->withDefault();
    }

    public function createdBy()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by')->withDefault();
    }

    public function approvalDetail()
    {
        return $this->hasOne(LegalApprovalDetail::class);
    }
}
