<?php

namespace App\Http\Resources\JSONAPI;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class GroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd();
        return [
            'data' => [
                'type' => 'Group',
                'id' => (string) $this->id,
                'attributes' => [
                    'nombre' => $this->name,
                ],
            ],
            'relations' => [
                'postit' => (is_a($this->whenLoaded('postit'),'App\Models\postit'))? PostitResource::make($this->whenLoaded('postit')) : url('/api/postit/'.$this->postit_id)
            ]
            ,
            'links' => [
                //'/api/group/'.$this->id
                'resource' => url('/api/group/'.$this->id)
            ]
        ];
    }
}
