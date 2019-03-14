<?php

namespace App\Http\Resources\Club;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserName as UserNameResource;

class ClubMember extends JsonResource
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
            "user_id" => $this->user_id,
            "join_status" => $this->join_status,
            "role" => $this->role,
            "user" => new UserNameResource($this->user)
        ];
    }
}
