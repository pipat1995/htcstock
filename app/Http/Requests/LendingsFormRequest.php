<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LendingsFormRequest extends FormRequest
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
