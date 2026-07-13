<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends FormRequest
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
            "education_value_create" => ['required' , 'string'],
            "education_education_create" => ['required' , 'string'],
            "education_adress_create" => ['required' , 'string'],
            "education_start_date_create" => ['required' , 'date'],
            "education_end_date_create" => ['required' , 'date' ,'after:education_start_date_create'],
            "education_gpa_create" => ['required' , 'numeric' , 'between:0,100'],
            "education_file_create" => ['required' , 'file']
        ];
    }
}
