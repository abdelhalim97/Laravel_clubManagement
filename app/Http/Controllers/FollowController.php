<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\Event;
use App\Models\UserClub;
use Auth;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $clubs=$currentUser->clubs;
        // foreach ($currentUser->clubs as $club) {
        //     $club->pivot->club_id;
        // }
        // $clubs = UserClub::where('user_id', '=', $currentUserId)->first();//findMany
        // dd($clubs);
        return view('clubs.show-my-clubs',compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::user()->id;
        $clubId = Club::find($id)->users()->detach($userId);
        return  redirect('/show-follows');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userClub= new userClub;
        $currentUserId = Auth::user()->id;
        $clubId = Club::find($id)->id;
        $userClub->user_id=$currentUserId;
        $userClub->club_id=$clubId;
        $userClub->save();
        return redirect('/show-clubs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::user()->id;
        $clubId = Club::find($id)->users()->detach($userId);
        return  redirect()->back();
    }
}
