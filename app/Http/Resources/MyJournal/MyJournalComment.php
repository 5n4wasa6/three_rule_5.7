<?php

namespace App\Http\Resources\MyJournal;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MyJournal\MyJournalCommentCount as MyJournalCommentCountResource;

class MyJournalComment extends JsonResource
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
            "comment" => $this->comment,
            "my_journal_comment_count" => MyJournalCommentCountResource::collection($this->my_journal_comment_count)
        ];
    }
}
