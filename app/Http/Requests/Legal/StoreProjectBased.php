<?php

namespace App\Http\Requests\Legal;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectBased extends FormRequest
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
            'quotation' => 'required',
            'coparation_sheet' => 'required',

            'scope_of_work' => 'required',
            'location' => 'required',
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
            'quotation.required' => 'Please enter quotation',
            'coparation_sheet.required' => 'Please enter coparation_sheet',

            'scope_of_work.required' => 'Please enter scope_of_work',
            'location.required' => 'Please enter location',
            'purchase_order_no.required' => 'Please enter purchase_order_no',
            'quotation_no.required' => 'Please enter quotation_no',
            'dated.required' => 'Please enter dated',
            'contract_period.required' => 'Please enter contract_period',
            'untill.required' => 'Please enter untill',
            
            'detail_payment_term.required' => 'Please enter payment_term',

        ];
    }
}
