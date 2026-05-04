<?php

namespace App\Http\Requests;

use App\Rules\BudgetRule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'name' => ['required' , 'string' , 'max:30' , 'unique:projects,name'],
            'description' => ['required' , 'string'],
            'category' => ['required' , 'in:programming,designing,other'],
            'budget' => ['required' , new BudgetRule()]
        ];
    }
}
