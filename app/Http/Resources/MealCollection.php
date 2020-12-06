<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $lengthAwarePaginator = $this->resource;

        return [
            'meta' => [
                'currentPage' =>  $lengthAwarePaginator->currentPage(),
                'totalItems' =>  $lengthAwarePaginator->total(),
                'itemsPerPage' => intval($lengthAwarePaginator->perPage()),
                'totalPages' => $lengthAwarePaginator->lastPage(),
            ],
            'data' => MealResource::collection($this->items()),
            'links' => [
                'prev' => $this->previousPageUrl(),
                'next' => $this->nextPageUrl(),
                'self' => $this->url($this->resource->currentPage()),
            ],
        ];
    }
}
