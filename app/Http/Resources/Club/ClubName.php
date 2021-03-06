<?php

namespace App\Http\Resources\Club;

use Illuminate\Http\Resources\Json\JsonResource;

class ClubName extends JsonResource
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
            "id"             => $this->id,
            "school_name"    => $this->school_name,
            "school_calling" => $this->school_calling,
            "club_name"      => $this->club_name,   
            "club_calling"   => $this->club_calling
        ];
    }
}
