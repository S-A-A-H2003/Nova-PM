<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalExperienceUpdateRequest extends FormRequest
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
            "professional_experience_value" => ['required' , 'string'],
            "professional_experience_start_date" => ['required' , 'date'],
            "professional_experience_end_date" => ['required' , 'date' ,'after:professional_experience_start_date'],
            "professional_experience_adress" => ['required' , 'string'],
            "professional_experience_file" => ['nullable' , 'file']
        ];
    }
}
