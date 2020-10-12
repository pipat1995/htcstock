<?php

namespace App\Models\Legal;

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
        'security_guard_license', 'comercial_term_id', 'payment_term_id', 'warranty'
    ];

    public function legalcontract()
    {
        return $this->belongsTo(\App\Models\Legal\LegalContract::class,);
    }
}
