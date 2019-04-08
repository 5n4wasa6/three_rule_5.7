<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Mypage\Update as UpdateRequest;
use App\Http\Requests\Mypage\Icon as IconRequest;
use App\Http\Requests\Mypage\StoreMyJournal as StoreMyJournalRequest;
use App\Http\Requests\Mypage\UpdateMyJournal as UpdateMyJournalRequest;

use App\Http\Resources\User\User as UserResource;
use App\Models\Fan;
use App\Models\MyJournal;
use App\Models\Mypage;
use App\User;

class MypageController extends Controller
{
    public function show($club_id, $user_id) {
        
        $mypage = UserResource::collection(
                    User::with(
                    'fan',
                    'mypage',
                    'my_journal','my_journal_count','my_journal_comment','my_journal_comment_count'
                )->where("id",$user_id)->get()
            );
        return $mypage;
    }
    public function update(UpdateRequest $request, $club_id, $user_id) {
        
        $this->authorize("mypage", $user_id);
        $mypage = Mypage::find($user_id);
        // $mypage->oneword    = $request->oneword;
        $mypage->rule_one   = $request->rule_one;
        $mypage->rule_two   = $request->rule_two;
        $mypage->rule_three = $request->rule_three;
        $mypage->save();
        
        return response()->json($mypage);
    }
    public function icon(IconRequest $request, $club_id, $user_id) {
        
        $this->authorize("mypage", $user_id);
        
        // $exploded = explode(',',$request->icon);
        // $decoded = base64_decode($exploded[1]);

        // if(str_contains($exploded[0],'jpeg'))
        //     $extension = 'jpeg';
        // else
        //     $extension = 'png';
        
        // $fileName = str_random().'.'.$extension;
        // $path = public_path().'/'.$fileName;
        // file_put_contents($path, $decoded);
        
        
        $uploadedFile = $request->file('icon');
        $path = \Storage::disk('public')->put('/hoge.png', $uploadedFile);
        $uploadedUrl = \Storage::disk('public')->url($path);
        // return ['url' => $uploadedUrl];
        
        $icon = Mypage::find($user_id);
        $icon->icon = $uploadedUrl;
        $icon->save();
        
        $mypage = UserResource::collection(
                    User::with(
                    'fan',
                    'mypage',
                    'my_journal','my_journal_count','my_journal_comment','my_journal_comment_count'
                )->where("id",$user_id)->get()
            );
        return $mypage;
        // return ['url' => $uploadedUrl];
    }
    
    public function store(StoreMyJournalRequest $request, $club_id, $user_id) {
        
        $this->authorize("mypage", $user_id);
        $uid = auth()->user()->id;
        $myjournal = new MyJournal;
        // $myjournal->user_id      = $uid;
        $myjournal->user_id      = $uid;
        $myjournal->activity_at  = $request->activity_at;
        $myjournal->title        = $request->title;
        $myjournal->appeal       = $request->appeal;
        $myjournal->improvement  = $request->improvement;
        $myjournal->nextaction   = $request->nextaction;
        $myjournal->free         = $request->free;
        $myjournal->image        = "test";
        $myjournal->save();
        return response()->json($myjournal);
    }
    
    public function updateMyJournal(UpdateMyJournalRequest $request, $club_id, $user_id, $myjournal_id) {
        
        $this->authorize("mypage", $user_id);
        $myjournal = MyJournal::find($myjournal_id);
        $myjournal->user_id      = $user_id;
        $myjournal->activity_at  = $request->activity_at;
        $myjournal->title        = $request->title;
        $myjournal->appeal       = $request->appeal;
        $myjournal->improvement  = $request->improvement;
        $myjournal->nextaction   = $request->nextaction;
        $myjournal->free         = $request->free;
        $myjournal->image        = $request->image;
        $myjournal->save();
        return response()->json($myjournal);
    }
    
}
