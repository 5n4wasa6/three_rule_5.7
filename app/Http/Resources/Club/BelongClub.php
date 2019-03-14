<?php

namespace App\Http\Resources\Club;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Club\ClubName as ClubNameResource;

class BelongClub extends JsonResource
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
            "join_status" => $this->join_status,
            "club" => new ClubNameResource($this->club)
        ];
    }
}
