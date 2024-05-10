<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // "user" => $this->User($this->user_id),
            "post_id" => $this->post_id,
            "user_id" => $this->user_id,
            "comment" => $this->comment,
        ];
    }
}
