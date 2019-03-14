<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionCommentCount extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function discussion_comment() {
        return $this->belongsTo('DiscussionComment::class');
    }
}
