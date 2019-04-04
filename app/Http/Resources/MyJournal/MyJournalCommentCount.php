<?php

namespace App\Http\Resources\MyJournal;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserName as UserNameResource;

class MyJournalCommentCount extends JsonResource
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
            "user" => new UserNameResource($this->user)
        ];
    }
}
