<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminTechnicianRequest extends FormRequest
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
            // user_id لا نسمح بتغييره من التحديث لأنه one-to-one
            'user_id'             => 'prohibited',
            'service_id'          => 'sometimes|exists:services,id',
            'years_of_experience' => 'sometimes|integer|min:0|max:60',
            'skills_description'  => 'sometimes|string|max:2000',
        ];
    }
}
