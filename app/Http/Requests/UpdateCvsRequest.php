<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCvsRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'objective' => 'required|string|max:500',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'skills' => 'required|string|max:500', 
            'work_experince' => 'required|string|max:1000',
        ];
    }
}
