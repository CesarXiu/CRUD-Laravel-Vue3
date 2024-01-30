<?php

namespace App\Http\Resources;

use App\Http\Resources\JSONAPI\GroupResource;
use App\Http\Resources\JSONAPI\PostitResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd($this);
        return [
            'data' => GroupResource::make($this),
            'relations' => PostitResource::make($this),
            'links' => [
                //'/api/group/'.$this->id
                'self' => url()->current()
            ]
        ];
    }
}
