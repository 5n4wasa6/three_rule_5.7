<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\Icon as IconResource;

class UserName extends JsonResource
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
            "id"     => $this->id,
            "name"   => $this->name,
            "mypage" => IconResource::collection($this->mypage)
            // "mypage" => new IconResource($this->mypage)
        ];
    }
}
