<?php

namespace App\Models\Legal;

use Illuminate\Database\Eloquent\Model;

class LegalPaymentTerm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_type_id', 'detail_payment_list', 'monthly', 'route_change', 'payment_ot', 'holiday_pay', 'ot_driver',
        'other_expense', 'price_of_service', 'detail_payment_term'
    ];
}
