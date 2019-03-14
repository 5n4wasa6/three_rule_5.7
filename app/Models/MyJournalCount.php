<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJournalCount extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function my_journal() {
        return $this->belongsTo('MyJournal::class');
    }
}
