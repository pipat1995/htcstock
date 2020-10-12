<?php

namespace App\Http\Requests\IT;

use Illuminate\Foundation\Http\FormRequest;

class BudgetFormRequest extends FormRequest
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
            'budgets_of_month' => 'required|numeric|min:1',
            'month' => 'required',
            'year' => 'required'
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
            'budgets_of_month.required|numeric|min:1' => 'Please enter qty',
            'month' => 'Please select month',
            'year' => 'Please select year'
        ];
    }
}
