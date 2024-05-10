<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'appversion' => $this->appversion,
            "updatemessage" => $this->updatemessage,
            'iosappversion' => $this->iosappversion,
            "iosupdatemessage" => $this->iosupdatemessage,




        ];
    }
}
