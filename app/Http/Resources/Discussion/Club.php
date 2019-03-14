<?php

namespace App\Http\Resources\Discussion;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Discussion\Discussion as DiscussionResource;
use App\Http\Resources\Club\ClubMember as ClubMemberResource;

class Club extends JsonResource
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
            "school_name"    => $this->school_name,
            "school_calling" => $this->school_calling,
            "club_name"      => $this->club_name,   
            "club_calling"   => $this->club_calling,
            
            "discussion"  => DiscussionResource::collection($this->discussion),
            "club_member" => ClubMemberResource::collection($this->club_member)
        ];
    }
}
