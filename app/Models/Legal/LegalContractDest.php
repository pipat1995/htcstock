<?php

namespace App\Models\Legal;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LegalContractDest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_type_contract_id', 'purchase_order', 'quotation', 'coparation_sheet', 'work_plan', 'boq', 'drawing',
        'factory_permission', 'waste_permission', 'transportation_permission', 'vehicle_registration_certificate',
        'route', 'insurance', 'driver_license', 'doctor_license', 'nurse_license', 'security_service_certification',
        'security_guard_license', 'comercial_term_id', 'payment_term_id', 'warranty', 'payment_type_id','value_of_contract'
    ];

    public function legalcontract()
    {
        return $this->hasOne(LegalContract::class,'contract_dest_id');
    }

    public function legalComercialTerm()
    {
        return $this->belongsTo(LegalComercialTerm::class,'comercial_term_id')->withDefault();
    }

    public function legalComercialList()
    {
        return $this->hasMany(LegalComercialList::class,'contract_dests_id');
    }

    public function legalPaymentTerm()
    {
        return $this->belongsTo(LegalPaymentTerm::class,'payment_term_id')->withDefault();
    }

    public function legalPaymentType()
    {
        return $this->belongsTo(LegalPaymentType::class, 'payment_type_id')->withDefault();
    }

    public function legalSubtypeContract()
    {
        return $this->belongsTo(LegalSubtypeContract::class,'sub_type_contract_id')->withDefault();
    }

}
