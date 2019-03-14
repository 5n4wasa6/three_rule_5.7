<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyJournalCommentCount extends Model
{
    public function user() {
        return $this->belongsTo('User::class');
    }
    public function my_journal_comment() {
        return $this->belongsTo('MyJournalComment::class');
    }
}
