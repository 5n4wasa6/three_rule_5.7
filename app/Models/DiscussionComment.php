<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionComment extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function club() {
        return $this->belongsTo('Club::class');
    }
    public function discussion() {
        return $this->belongsTo('Discussion::class');
    }
    
    public function discussion_comment_count() {
        return $this->hasMany('DiscussionCommentCount::class');
    }
}
