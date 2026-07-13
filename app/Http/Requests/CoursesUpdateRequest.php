<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected $errorBag = 'courses';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "courses_value_update" => ['required' , 'string'],
            "courses_place_update" => ['required' , 'string'],
            "courses_start_date_update" => ['required' , 'date'],
            "courses_end_date_update" => ['required' , 'date' ,'after:courses_start_date_update'],
            "courses_file_update" => ['nullable' , 'file']
        ];
    }
}
