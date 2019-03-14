<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function club() {
          return $this->belongsTo('Club::class');
    }
    // public function activity() {
    //       return $this->belongsTo('Activity::class');
    // }
      
      
    // public function calendar_count() {
    //     return $this->hasMany('CalendarCount::class');
    // }
    // public function calendar_comments() {
    //     return $this->hasMany('CalendarComment::class');
    // }
}
