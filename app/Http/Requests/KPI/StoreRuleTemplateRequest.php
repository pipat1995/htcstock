<?php

namespace App\Http\Requests\KPI;

use Illuminate\Foundation\Http\FormRequest;

class StoreRuleTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:kpi_templates|max:255',
            'department_id' => 'required'
        ];
    }
}
