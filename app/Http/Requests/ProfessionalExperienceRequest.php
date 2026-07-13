<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionalExperienceRequest extends FormRequest
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
            "professional_experience_value_create" => ['required' , 'string'],
            "professional_experience_start_date_create" => ['required' , 'date'],
            "professional_experience_end_date_create" => ['required' , 'date' ,'after:professional_experience_start_date_create'],
            "professional_experience_adress_create" => ['required' , 'string'],
            "professional_experience_description_create" => ['required' , 'string'],
            "professional_experience_file_create" => ['required' , 'file']
        ];
    }
}
