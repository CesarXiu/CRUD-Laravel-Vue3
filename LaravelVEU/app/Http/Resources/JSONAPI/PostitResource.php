<?php

namespace App\Http\Resources\JSONAPI;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //dd($this);
        return [
            'type' => 'postit',
            'id' => (string) $this->id,
            'attributes' => [
                'tarea' => $this->tarea,
                'descripcion' => $this->descripcion,
            ],
            'relations' => [
                //'postit' => PostitResource::make( $this->postit)
            ]
            ,
            'links' => [
                //'/api/group/'.$this->id
                'self' => url('/api/postit/'.$this->id)
            ]
        ];
    }
}
