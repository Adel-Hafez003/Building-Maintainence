<?php

namespace App\Http\Resources; // ← مهم جداً "Resources" جمع

use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'             => $this->id,
            'status'         => $this->status,
            'service_id'     => $this->service_id,
            'region_id'      => $this->region_id,
            'title'          => $this->title,
            'description'    => $this->description,
            'address_text'   => $this->address_text,
            'scheduled_date' => $this->scheduled_date,
            'scheduled_time' => $this->scheduled_time,
        ];
    }
}
