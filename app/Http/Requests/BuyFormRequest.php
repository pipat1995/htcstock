<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyFormRequest extends FormRequest
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
            'access_id' => 'required',
            'qty' => 'required',
            'ir_no' => 'required',
            'po_no' => 'required',
            'invoice_no' => 'required',
            'vendor_id' => 'required'
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
            'access_id.required' => 'Please enter accessories',
            'qty.required' => 'Please enter qty',
            'ir_no.required' => 'Please enter ir',
            'po_no.required' => 'Please enter po',
            'invoice_no.required' => 'Please enter invoice',
            'vendor_id.required' => 'Please enter vendor',
        ];
    }
}
