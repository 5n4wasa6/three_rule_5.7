<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Menu\Store as StoreRequest;
use App\Http\Requests\Menu\Update as UpdateRequest;
use App\Http\Requests\Menu\UpdateTag as UpdateTagRequest;

use App\Models\Club;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index($id)
    {
        $menus = Menu::where("club_id",$id)->get();
        return $menus;
    }
    public function store(StoreRequest $request, $id)
    {
        $uid = auth()->user()->id;
        $menu = new Menu;
        $menu->user_id     = $uid;
        $menu->club_id     = $id;
        $menu->tag         = $request->tag;
        $menu->title       = $request->title;
        $menu->url         = $request->url;
        $menu->description = $request->description;
        $menu->save();
        
        $menus = Menu::where("club_id",$id)->get();
        return $menus;
    }
    public function update(UpdateRequest $request, $club_id, $menu_id)
    {
        $uid = auth()->user()->id;
        $menu = Menu::find($menu_id);
        $menu->user_id     = $uid;
        $menu->club_id     = $club_id;
        $menu->tag         = $request->tag;
        $menu->title       = $request->title;
        $menu->url         = $request->url;
        $menu->description = $request->description;
        $menu->save();
        
        $menus = Menu::where("club_id",$club_id)->get();
        return $menus;
    }
    public function updateTag(ReqUpdateTagRequestuest $request, $club_id)
    {
        // \Log::info($club_id);
        // $uid = auth()->user()->id;
        $menu = Club::find($club_id);
        // $menu->user_id     = $uid;
        $menu->tag_one   = $request->tag_one;
        $menu->tag_two   = $request->tag_two;
        $menu->tag_three = $request->tag_three;
        $menu->tag_four  = $request->tag_four;
        $menu->tag_five  = $request->tag_five;
        $menu->save();
        
        $menus = Menu::where("club_id",$club_id)->get();
        return $menus;
    }
    public function destroy($club_id, $menu_id)
    {
        $menu = Menu::find($menu_id);
        if($menu -> count()) {
            $menu -> delete();
            
            $menus = Menu::where("club_id",$club_id)->get();
            return $menus;
        }else {
            return response() -> json('error');
        }
    }
}
