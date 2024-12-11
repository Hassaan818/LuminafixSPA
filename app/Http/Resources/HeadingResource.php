<?php

namespace App\Http\Resources;

use App\Models\Heading;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeadingResource extends JsonResource
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
            'blog' => new BlogResource($this->blog),
            'sequence' => $this->sequence,
            'heading' => $this->heading,
            'description' => $this->description,
            'linkedin' => $this->linkedin,
            'image' => Heading::getImagePath($this->image)
        ];
    }
}
