<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KnowledgeResource extends JsonResource
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
            'mmtitle' => $this->mmtitle,

            'engtitle' => $this->engtitle,
            'author' => $this->author,

            'source' => $this->source,
            'timeStamp' => $this->timeStamp,

            'mmcontent' => $this->mmcontent,
            'engcontent' => $this->engcontent,

            'image' => $this->image,
            'viewcount' => $this->viewcount,

        ];
    }
}