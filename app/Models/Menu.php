<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function club() {
        return $this->belongsTo('Club::class');
    }
    // public function timezone() {
    //     return $this->belongsTo('Timezone::class');
    // }
    // public function position() {
    //     return $this->belongsTo('Position::class');
    // }
      
    // public function menu_tag() {
    //     return $this->hasMany('MenuTag::class');
    // }
    // public function menu_counts() {
    //     return $this->hasMany('MenuCount::class');
    // }
    // public function menu_comments() {
    //     return $this->hasMany('MenuComment::class');
    // }
}
