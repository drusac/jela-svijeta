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
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status(),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'ingredients' => IngredientResoruce::collection($this->whenLoaded('ingredients')),
        ];
    }
}
