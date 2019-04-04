<?php

namespace App\Http\Controllers;

use App\Http\Resources\Calendar\Calendar as CalendarResource;
use App\Http\Requests\Calendar\Store as StoreRequest;
use App\Http\Requests\Calendar\Update as UpdateRequest;

use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\Club;
use App\Models\Menu;

class CalendarController extends Controller
{
    public function index($id)
    {
        $calendars = CalendarResource::collection(
                 Calendar::where("club_id",$id)->get()
                );
        return $calendars;
    }
    public function store(StoreRequest $request, $id)
    {
        $uid = auth()->user()->id;
        
        $menu =  new Menu;
        $menu->user_id     = $uid;
        $menu->club_id     = $id;
        $menu->tag         = $request->tag;
        $menu->title       = $request->title;
        $menu->url         = $request->url;
        $menu->description = $request->description;
        $menu->save();
        
        $calendar = new Calendar;
        $calendar->user_id     = $uid;
        $calendar->club_id     = $id;
        $calendar->start       = $request->start;
        $calendar->end         = $request->start;
        $calendar->title       = $request->title;
        $calendar->tag         = $request->tag;
        $calendar->schedule    = $request->schedule;
        $calendar->start_time  = $request->start_time;
        $calendar->end_time    = $request->end_time;
        $calendar->url         = $request->url;
        $calendar->description = $request->description;
        $calendar->save();
        
        $calendars = CalendarResource::collection(
                 Calendar::where("club_id",$id)->get()
                );
        return $calendars;
    }
    public function update(UpdateRequest $request, $club_id, $calendar_id)
    {
        $uid = auth()->user()->id;
        $calendar = Calendar::find($calendar_id);
        $calendar->user_id     = $uid;
        $calendar->club_id     = $club_id;
        $calendar->start       = $request->start;
        $calendar->title       = $request->title;
        $calendar->tag         = $request->tag;
        $calendar->schedule    = $request->schedule;
        $calendar->start_time  = $request->start_time;
        $calendar->end_time    = $request->end_time;
        $calendar->url         = $request->url;
        $calendar->description = $request->description;
        $calendar->save();
        
        $calendars = CalendarClubResource::collection(
            Calendar::where("club_id",$club_id)->get()
        );
        return $calendars;
    }
    public function destroy($club_id, $calendar_id)
    {
        $calendar = Calendar::find($calendar_id);
        if($calendar -> count()) {
            $calendar -> delete();
            $calendars = CalendarClubResource::collection(
                Calendar::where("club_id",$club_id)->get()
            );
            return $calendars;
        }else {
            return response() -> json('error');
        }
    }
}
