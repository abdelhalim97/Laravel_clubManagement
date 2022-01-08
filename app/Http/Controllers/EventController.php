<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Club;
use App\Models\User;
use App\Models\Comment;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(12);
        return view('events.show-events', compact('events'));
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
        return view('events.add-event', compact('clubs','currentUserClubId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000','min:100'],
            'club_id' => ['required','numeric' ],
            'img' => ['required' ],
        ]);
        $club=Club::find($request->input('club_id'));
        $newImageName = time().'-'.$request->name.'.'.$request->file('img')->extension();
        $request->file('img')->move(public_path('images') ,$newImageName);
        $event=new event;
        $event->name=$request->input('name');
        $event->description=$request->input('description');
        $event->club_id=$request->input('club_id');
        $event->image=$newImageName;
        $event->save();
        return redirect('/show-events');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $comments = $event->comments;
        $commentsLength=count($comments);
        return view('events.show-event-comment',compact('event','comments','commentsLength'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //search

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
        $request->validate([
            'description' => ['required', 'string', 'min:1'],
        ]);
        $userId=Auth::user()->id;
        $eventId = Event::find($id)->id;
        $comment=new comment;
        $comment->description=$request->input('description');
        $comment->user_id=$userId;
        $comment->event_id=$eventId;
        // $comment->user_name=Auth::user()->name;
        $comment->save();
        $event = Event::find($id);
        return redirect('/show-events/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
