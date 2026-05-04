<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OverviewRequest extends FormRequest
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
            "photo" => ['nullable' , 'max:1000'],
            "name" => ['required' , 'string' , 'max:50'],
            "email" => ['nullable' , 'email'],
            "phone_number" => ['nullable'],
            "date_pirth" => ['nullable' , 'date'],
            "gender" => ['nullable' , 'string' , 'in:male,female'],
            "address" => ['nullable' , 'string'],
            "occupation" => ['nullable' , 'string' , 'max:50'],
            "link_one" => ['nullable' , 'required_with:link_one_as' , 'string'],
            "link_two" => ['nullable' , 'required_with:link_two_as' , 'string'],
            "link_three" => ['nullable' , 'required_with:link_three_as' , 'string'],
            "link_one_as" => ['nullable' , 'required_with:link_one'],
            "link_two_as" => ['nullable' , 'required_with:link_two'],
            "link_three_as" => ['nullable' , 'required_with:link_three']
        ];
    }
}
