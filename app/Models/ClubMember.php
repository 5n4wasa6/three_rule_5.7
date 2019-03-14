<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubMember extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function club() {
        return $this->belongsTo('App\Club');
    }
}
