<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            // 'category' => $this->when($this->category_id, $this->category_id),
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags),
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
        ];
    }
}
