<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJournalComment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function my_journal() {
        return $this->belongsTo('App\Models\MyJournal');
    }
      
      
    public function my_journal_comment_count() {
        return $this->hasMany('App\Models\MyJournalCommentCount');
    }
}
