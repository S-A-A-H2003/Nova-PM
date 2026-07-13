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

    protected $errorBag = 'professionalExperience';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "professional_experience_value_update" => ['required' , 'string'],
            "professional_experience_start_date_update" => ['required' , 'date'],
            "professional_experience_end_date_update" => ['required' , 'date' ,'after:professional_experience_start_date_update'],
            "professional_experience_adress_update" => ['required' , 'string'],
            "professional_experience_description_update" => ['required' , 'string'],
            "professional_experience_file_update" => ['nullable' , 'file']
        ];
    }
}
