<?php

namespace App\Http\Requests\Legal;

use Illuminate\Foundation\Http\FormRequest;

class StoreMarketing extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subtype' => 'required',
            'purchase_order' => 'required',
            'quotation' => 'required',
            
            'purpose' => 'required',
            'promote_a_product' => 'required',
            'purchase_order_no' => 'required',
            'quotation_no' => 'required',
            'dated' => 'required',
            'contract_period' => 'required',
            'untill' => 'required',

            'detail_payment_term' => 'required',

        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'subtype.required' => 'Please enter subtype',
            'purchase_order.required' => 'Please enter purchase_order',
            'quotation.required' => 'Please enter quotation',

            'purpose.required' => 'Please enter purpose',
            'promote_a_product.required' => 'Please enter promote_a_product',
            'purchase_order_no.required' => 'Please enter purchase_order_no',
            'quotation_no.required' => 'Please enter quotation_no',
            'dated.required' => 'Please enter dated',
            'contract_period.required' => 'Please enter contract_period',
            'untill.required' => 'Please enter untill',
            
            'detail_payment_term.required' => 'Please enter payment_term',

        ];
    }
}
