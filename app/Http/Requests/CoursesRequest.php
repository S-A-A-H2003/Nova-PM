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

    protected $errorBag = 'courses';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "courses_value_create" => ['required' , 'string'],
            "courses_place_create" => ['required' , 'string'],
            "courses_start_date_create" => ['required' , 'date'],
            "courses_end_date_create" => ['required' , 'date' ,'after:courses_start_date_create'],
            "courses_file_create" => ['required' , 'file']
        ];
    }
}
