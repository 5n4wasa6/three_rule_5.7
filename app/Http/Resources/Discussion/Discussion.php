<?php

namespace App\Http\Resources\Discussion;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserName as UserNameResource;
use App\Http\Resources\Discussion\DiscussionCount as DiscussionCountResource;
use App\Http\Resources\Discussion\DiscussionComment as DiscussionCommentResource;

class Discussion extends JsonResource
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
            "id"    => $this->id,
            "body"  => $this->body,
            "image" => $this->image,
            
            "user"               => new UserNameResource($this->user),
            "discussion_count"   => DiscussionCountResource::collection($this->discussion_count),
            "discussion_comment" => DiscussionCommentResource::collection($this->discussion_comment)
        ];
    }
}
