<?php

namespace App\Http\Resources;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'team_id' => new TeamResource($this->team),
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'image' => Blog::getImagePath($this->image),
            'status' => $this->status,
            'created_at' => $this->created_at,
            'headings' => HeadingResource::collection($this->whenLoaded('headings'))
        ];
    }
}
