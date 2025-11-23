<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTechnicianDetailRequest extends FormRequest
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
            'user_id' => [
            'required',
            // لازم يكون المستخدم موجود ودوره technician ومفعّل
            Rule::exists('users', 'id')->where(fn($q) =>
                $q->where('role', 'technician')->where('is_active', true)
            ),
            // سجل واحد فقط (تجاهل المحذوف سوفت)
            Rule::unique('technician_details', 'user_id')->whereNull('deleted_at'),
        ],
            'service_id'          => 'required|exists:services,id',
            'years_of_experience' => 'nullable|integer|min:0|max:60',
            'skills_description'  => 'nullable|string|max:2000',
        ];
    }
}
