<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_type() {
        return $this->belongsTo('App\Models\UserType');
      }
      public function club(){
        return $this->belongsTo('App\Models\Club');
      }
      
      
      public function fan(){
        return $this->hasMany('App\Models\Fan');
      }
      public function club_fan(){
        return $this->hasMany('App\Models\ClubFan');
      }
      public function club_member(){
        return $this->hasMany('App\Models\ClubMember');
      }
      public function mypage(){
        return $this->hasMany('App\Models\Mypage');
      }
      public function strategy(){
        return $this->hasMany('App\Models\Strategy');
      }
      
      public function discussion(){
        return $this->hasMany('App\Models\Discussion');
      }
      public function discussion_count(){
        return $this->hasMany('App\Models\DiscussionCount');
      }
      public function discussion_comments(){
        return $this->hasMany('App\Models\DiscussionComment');
      }
      public function discussion_comment_count(){
        return $this->hasMany('App\Models\DiscussionCommentCount');
      }
      
      public function menu(){
        return $this->hasMany('App\Models\Menu');
      }
      public function menu_count(){
        return $this->hasMany('App\Models\MenuCount');
      }
      public function menu_comments(){
        return $this->hasMany('App\Models\MenuComment');
      }
      public function menu_comment_counts(){
        return $this->hasMany('App\Models\MenuCommentCount');
      }
      
      public function calendar(){
        return $this->hasMany('App\Models\Calendar');
      }
      public function calendar_count(){
        return $this->hasMany('App\Models\CalendarCount');
      }
      public function calendar_comments(){
        return $this->hasMany('App\Models\CalendarComment');
      }
      public function calendar_comment_counts(){
        return $this->hasMany('App\Models\CalendarCommentCount');
      }
      
      public function journal(){
        return $this->hasMany('App\Models\Journal');
      }
      public function journal_count(){
        return $this->hasMany('App\Models\JournalCount');
      }
      public function journal_comments(){
        return $this->hasMany('App\Models\JournalComment');
      }
      public function journal_comment_counts(){
        return $this->hasMany('App\Models\JournalCommentCount');
      }
      
      public function my_journal(){
        return $this->hasMany('App\Models\MyJournal');
      }
      public function my_journal_count(){
        return $this->hasMany('App\Models\MyJournalCount');
      }
      public function my_journal_comment(){
        return $this->hasMany('App\Models\MyJournalComment');
      }
      public function my_journal_comment_count(){
        return $this->hasMany('App\Models\MyJournalCommentCount');
      }
      public function topic(){
        return $this->hasMany('App\Models\Topic');
      }
      
      
      public function getJWTIdentifier()
      {
        return $this->getKey();
      }
      public function getJWTCustomClaims()
      {
        return [];
      }
}
