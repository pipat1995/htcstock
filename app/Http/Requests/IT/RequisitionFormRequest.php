<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class RequisitionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('create-requisition') || Gate::allows('edit-requisition');
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
            'qty' => 'required|numeric|min:1',
            'trans_by' => 'required'
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
            'access_id.required' => 'Please select อุปกรณ์',
            'qty.required' => 'Please enter จำนวน',
            'trans_by.required' => 'Please select คนเบิก',
        ];
    }
}
