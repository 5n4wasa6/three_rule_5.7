<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function club() {
        return $this->belongsTo('App\Models\Club');
    }
}
