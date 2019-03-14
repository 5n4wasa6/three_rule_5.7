<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function club() {
        return $this->belongsTo('Club::class');
    }
    

    public function discussion_count() {
        return $this->hasMany('DiscussionCount::class');
    }
    public function discussion_comment() {
        return $this->hasMany('DiscussionComment::class');
    }
}
