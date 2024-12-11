<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'image' => Service::getImagePath($this->image),
            'status' => $this->status,
            'category' => $this->category,
            'detail_page_heading' => $this->detail_page_heading,
            'detail_page_image' => Service::getImagePath($this->detail_page_image),
            'detail_page_description' => $this->detail_page_description,
            'detail_page_strategy_heading' => $this->detail_page_strategy_heading,
            'detail_page_strategy_description' => $this->detail_page_strategy_description,
        ];
    }
}
