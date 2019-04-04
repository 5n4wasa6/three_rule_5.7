<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Club\Store as StoreRequest;
use App\Http\Requests\Club\Update as UpdateRequest;

use App\Http\Resources\Club\SelectClub as SelectClubResource;
use App\Http\Resources\Club\SelectUser as SelectUserResource;
use App\Http\Resources\Club\Club as ClubResource;

use App\Models\ClubMember;
use App\Models\Club;
use App\Models\Topic;
use App\User;
use DB;

class ClubController extends Controller
{
    public function selectClub() 
    {
        // DB::connection()->enableQueryLog();
        $uid = auth()->user()->id;
        $user = SelectClubResource::collection(
                    User::with(
                    'club_member'
                )->where("id",$uid)->get()
            );
            
        return $user;
        
        // $topics = Topic::all();  
        // \Log::info($topics);
        // return $topics;
            
        // dd(DB::getQueryLog());
        // $queries = DB::getQueryLog();
        // return $queries;
        
        // return [
        //     $user,$topics
        // ];
    }
    public function approval(Request $request) 
    {
        
        $uid = auth()->user()->id;
        $user_id = $request->user_id;
        $club_id = $request->club_id;
        
        $club_member = ClubMember::where("user_id",$user_id)->where("club_id",$club_id)->select("id")->first();
        $club_member->join_status = 1;
        $club_member->save();
    
        $user = SelectClubResource::collection(
                    User::with(
                      'club_member'
                )->where("id",$uid)->get()
            );
        return $user;
    }
    public function destroy(Request $request)
    {
        $uid = auth()->user()->id;
        $user_id = $request->user_id;
        $club_id = $request->club_id;
        
        $club_member = ClubMember::where("user_id",$user_id)->where("club_id",$club_id)->select("id")->first();
        $club_member -> delete();
        
        $user = SelectClubResource::collection(
                    User::with(
                      'club_member'
                )->where("id",$uid)->get()
            );
        return $user;
    }
    public function user() 
    {
        $user = SelectUserResource::collection(
                  User::all()
            );
        return $user;
    }
    public function invite(Request $request, $club_id) 
    {
        // \Log::info($club_id);
        $uid = auth()->user()->id;
        $club_member = new ClubMember;
        $club_member->user_id = $request->id;
        $club_member->club_id = $club_id;
        $club_member->save();
        
        // \Log::info($club_member);
        
        $user = SelectClubResource::collection(
                User::with(
                'club_member'
            )->where("id",$uid)->get()
        );
        return $user;
    }
    public function store(StoreRequest $request) 
    {   
        $uid = auth()->user()->id;
        $club = new Club;
        $club->user_id         = $uid;
        $club->school_name     = $request->school_name;
        $club->school_calling  = $request->school_calling;
        $club->club_name       = $request->club_name;
        $club->club_calling    = $request->club_calling;
        $club->save();
        
        $club_member = new ClubMember;
        $club_member->user_id  = $uid;
        $club_member->club_id  = $club->id;
        $club_member->save();
        
        $user = SelectClubResource::collection(
                User::with(
                'club_member'
            )->where("id",$uid)->get()
        );
        return $user;
    }
    
    public function show($id) {
        $club = ClubResource::collection(
                    Club::with(
                        'club_member'
                    )->where("id",$id)->get()
                );
        return $club;
    }
    public function update(UpdateRequest $request, $id) 
    {
        $club = Club::find($id);
        $club->rule_one   = $request->rule_one;
        $club->rule_two   = $request->rule_two;
        $club->rule_three = $request->rule_three;
        $club->save();
        return response()->json($club);
        // return new ClubResource($club);
    }
    // public function updateRole(Request $request, $id) 
    // {
    //     \Log::info($request);
    //     $uid = auth()->user()->id;
    //     $role = ClubMember::where("user_id",$uid)->where("club_id",$id)->select("id")->first();
    //     // $role = ClubMember::where("user_id",$uid)->where("club_id",$id)->select("id")->first();
    //     $role->role = $request->role;
    //     $role->save();    
    //     return response()->json($role);
    // }
}
