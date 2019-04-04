<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function club() {
        return $this->belongsTo('App\Models\Club');
    }
    

    public function discussion_count() {
        return $this->hasMany('App\Models\DiscussionCount');
    }
    public function discussion_comment() {
        return $this->hasMany('App\Models\DiscussionComment');
    }
}
