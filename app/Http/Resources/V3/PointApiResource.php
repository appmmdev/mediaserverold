<?php

namespace App\Http\Resources\V3;

use App\Http\Resources\V1\UserCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PointApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "user_id" => $this->user_id,
            'points' => $this->points,
            "totalpoints" => $this->totalpoints,
            "username" => $this->user->username





        ];
    }
}
