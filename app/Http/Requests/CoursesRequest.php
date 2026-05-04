<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
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
            "courses_value" => ['required' , 'string'],
            "courses_place" => ['required' , 'string'],
            "courses_start_date" => ['required' , 'date'],
            "courses_end_date" => ['required' , 'date' ,'after:courses_start_date'],
            "courses_file" => ['required' , 'file']
        ];
    }
}
