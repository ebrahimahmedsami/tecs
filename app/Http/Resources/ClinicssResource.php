<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicssResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'disclosure_price' => $this->disclosure_price,
            'rediscovery_price' => $this->rediscovery_price,
            'today_capacity' => $this->today_capacity,
            'time_form' => $this->time_form,
            'time_to' => $this->time_to,
        ];
    }
}
