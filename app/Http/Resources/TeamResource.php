<?php

namespace App\Http\Resources;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'job_title' => $this->job_title,
            'image' => Team::getImagePath($this->image),
            'status' => $this->status,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter
        ];
    }
}
