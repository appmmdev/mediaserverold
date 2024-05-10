<?php

namespace App\Http\Resources\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
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
            "post_id" => $this->post_id,
            "userdetail" => $this->user,


            // "userdetail2" => new UserCollection($this->user),
        ];
    }
}
