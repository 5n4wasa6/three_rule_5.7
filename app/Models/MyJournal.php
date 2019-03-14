<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJournal extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
      
    public function my_journal_count() {
        return $this->hasMany('MyJournalCount::class');
    }
    public function my_journal_comment() {
        return $this->hasMany('MyJournalComment::class');
    }
}
