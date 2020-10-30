<?php

namespace App\Models\Legal;

use Illuminate\Database\Eloquent\Model;

class LegalPaymentType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'agreement_id'
    ];

    public function legalContractDest()
    {
        return $this->hasOne(LegalContractDest::class, 'payment_type_id');
    }
}
