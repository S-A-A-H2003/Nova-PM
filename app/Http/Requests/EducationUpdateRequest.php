<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected $errorBag = 'education';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "education_value_update" => ['required' , 'string'],
            "education_education_update" => ['required' , 'string'],
            "education_adress_update" => ['required' , 'string'],
            "education_start_date_update" => ['required' , 'date'],
            "education_end_date_update" => ['required' , 'date' ,'after:education_start_date_update'],
            "education_gpa_update" => ['required' , 'numeric' , 'between:0,100'],
            "education_file_update" => ['nullable' , 'file']
        ];
    }
}
