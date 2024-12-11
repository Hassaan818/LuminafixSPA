<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'project_name' => $this->project_name,
            'project_summary' => $this->project_summary,
            'project_review' => $this->project_review,
            'feedback' => $this->feedback,
            'image' => Review::getImagePath($this->image),
            'client_name' => $this->client_name,
            'status' => $this->status
        ];
    }
}
