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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "education_value" => ['required' , 'string'],
            "education_education" => ['required' , 'string'],
            "education_adress" => ['required' , 'string'],
            "education_start_date" => ['required' , 'date'],
            "education_end_date" => ['required' , 'date' ,'after:education_start_date'],
            "education_gpa" => ['required' , 'numeric' , 'between:0,100'],
            "education_file" => ['nullable' , 'file']
        ];
    }
}
