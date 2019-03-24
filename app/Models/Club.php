<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function user() {
        return $this->hasMany('App\User');
    }
    public function club_member() {
        return $this->hasMany('App\Models\ClubMember');
    }
    public function discussion() {
        return $this->hasMany('App\Models\Discussion');
    }
    public function discussion_comment() {
        return $this->hasMany('App\Models\DiscussionComment');
    }
    public function menu() {
        return $this->hasMany('App\Models\Menu');
    }
    public function calendar() {
        return $this->hasMany('App\Models\Calendar');
    }
}
