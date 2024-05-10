<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPostResource extends JsonResource
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
            'username' => $this->user->username,
            'profile_img' => $this->user->profileimage->image,
            'timestamp' => $this->timestamp,
            'post' => $this->post,
            'likes' => $this->postlikes->count(),
        ];
    }
}
