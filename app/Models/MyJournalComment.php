<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJournalComment extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function my_journal() {
        return $this->belongsTo('MyJournal::class');
    }
      
      
    public function my_journal_comment_count() {
        return $this->hasMany('MyJournalCommentCount::class');
    }
}
