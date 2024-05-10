<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AudioBookResource extends JsonResource
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
            "path" => $this->path,
            "engtitle" => $this->engtitle,
            "mmtitle" => $this->mmtitle,
            "singer" => $this->singer,
            "music_img" => $this->music_img,
        ];
    }
}
