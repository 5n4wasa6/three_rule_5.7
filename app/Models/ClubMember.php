<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubMember extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function club() {
        return $this->belongsTo('Club::class');
    }
}
