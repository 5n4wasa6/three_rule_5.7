<?php

namespace App\Http\Resources\Discussion;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\UserName as UserNameResource;
use App\Http\Resources\Discussion\DiscussionCommentCount as DiscussionCommentCountResource;

class DiscussionComment extends JsonResource
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
            "id"      => $this->id,
            "comment" => $this->comment,
            "user"    => new UserNameResource($this->user),
            "discussion_comment_count" => DiscussionCommentCountResource::collection($this->discussion_comment_count)
        ];
    }
}
