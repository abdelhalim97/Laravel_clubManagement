<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Club;
use App\Models\User;
use App\Models\Comment;
use Auth;
class EventsDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(6);
        return view('admin.event.events-dashboard', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $currentUserId = Auth::user()->id;
        $currentUserClub=Club::where('user_id', $currentUserId)->first();
        // dd($currentUserClub);
        if($currentUserClub!=null){
        $currentUserClubId=$currentUserClub->name;
        }
        else{$currentUserClubId=0;}
        // dd($currentUserClubId);
        $clubs = Club::all();
        return view('admin.event.dashboard-add-event', compact('clubs','currentUserClubId'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        unlink("images/".$event->image);
        $event->delete();
        return redirect('/dashboard/events-dashboard');
    }
}
