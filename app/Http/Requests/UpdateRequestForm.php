<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestForm extends FormRequest
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
           'service_id'     => 'required|exists:services,id',
            'region_id'      => 'required|exists:regions,id',
            'title'          => 'required|string|max:191',
            'description'    => 'required|string',
            'address_text'   => 'required|string|max:500',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'scheduled_time' => 'required|date_format:H:i',

            
            'tenant_id'      => 'prohibited',
            'technician_id'  => 'prohibited',
            'status'         => 'prohibited',
            'cancellation_reason' => 'prohibited',
            'canceled_at'    => 'prohibited',
        ];
    }
}
