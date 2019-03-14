<?php

namespace App\Http\Resources\Club;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Club\BelongClub as BelongClubResource;
// use App\Http\Resources\Club\BelongsClubFan as BelongsClubFanResource;

class SelectClub extends JsonResource
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
            "id"          => $this->id,
            "club_member" => BelongClubResource::collection($this->club_member),
            // "club_fan"    => BelongsClubFanResource::collection($this->club_fan)
        ];
    }
}
