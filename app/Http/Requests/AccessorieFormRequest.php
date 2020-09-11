<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccessorieFormRequest extends FormRequest
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
            'access_name' => 'required',
            'unit' => 'required'
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
            'access_name.required' => 'Please enter accessories name',
            'unit.required' => 'Please enter unit',
        ];
    }
}
