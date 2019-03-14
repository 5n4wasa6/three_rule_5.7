<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    public function user() {
        return $this->hasMany('User::class');
    }
    // public function school_calling() {
    //     return $this->belongsTo('SchoolCalling::class');
    // }
    // public function club_calling() {
    //     return $this->belongsTo('ClubCalling::class');
    // }
    
    
    // public function club_fan() {
    //     return $this->hasMany('ClubFan::class');
    // }
    public function club_member() {
        return $this->hasMany('ClubMember::class');
    }
    // public function strategy() {
    //     return $this->hasMany('Strategy::class');
    // }
    
    public function discussion() {
        return $this->hasMany('Discussion::class');
    }
    public function discussion_comment() {
        return $this->hasMany('DiscussionComment::class');
    }
    
    public function menu() {
        return $this->hasMany('App\Menu');
    }
    // public function menu_tag() {
    //     return $this->hasMany('MenuTag::class');
    // }
    // public function menu_comment() {
    //     return $this->hasMany('MenuComment::class');
    // }
    
    public function calendar() {
        return $this->hasMany('Calendar::class');
    }
    // public function calendar_comment() {
    // return $this->hasMany('App\CalendarComment');
    // }
    
    // public function journal() {
    //     return $this->hasMany('App\Journal');
    // }
    // public function journal_comment() {
    //     return $this->hasMany('App\JournalComment');
    // }
}
