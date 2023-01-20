<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'icon' => $this->icon,
            'text' => $this->text,
        ];
    }
}
