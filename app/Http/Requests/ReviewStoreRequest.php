<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //TODO вернуть потом false
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'reviewer' => 'required',
            'email' => 'required',
            'review' => 'required',
            'rating' => 'required',
            'employee' => 'required',
            'employees_position' => 'required',
            'unique_employee_number' => 'required',
            'company' => 'required',
            'company_description' => 'required',
        ];
    }
}
