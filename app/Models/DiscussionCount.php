<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscussionCount extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function discussion() {
        return $this->belongsTo('Discussion::class');
    }
}
