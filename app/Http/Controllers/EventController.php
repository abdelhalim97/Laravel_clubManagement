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
        $currentUserClub = Club::where('user_id', $currentUserId)->first();
        // dd($currentUserClub);
        if ($currentUserClub != null) {
            $currentUserClub = $currentUserClub;
            // dd($currentUserClubId);
        } else {
            $currentUserClub = 0;
        }
        $clubs = Club::all();
        // dd($currentUserClub);
        return view('events.add-event', compact('clubs', 'currentUserClub'));
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
            'name' => ['required', 'string', 'max:250'],
            'description' => ['required', 'string', 'max:250', 'min:100'],
            'club_id' => ['required', 'numeric'],
            'img' => ['required'],
        ]);
        $event = new event;
        $club = Club::find($request->input('club_id'));
        $newImageName = time() . '-' . $request->name . '.' . $request->file('img')->extension();
        $request->file('img')->move(public_path('images'), $newImageName);
        $event->image = $newImageName;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->club_id = $request->input('club_id');
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
        $commentsLength = count($comments);
        //like logic
        $test = false;
        foreach ($event->likes as $like) {
            if ($like->user_id == Auth::user()->id) {
                if ($like->like_type == 1) {
                    $test = 1;
                } else {
                    $test = -1;
                }
            }
        }
        return view('events.show-event-comment', compact('event', 'comments', 'commentsLength', 'test'));
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
        $userId = Auth::user()->id;
        $eventId = Event::find($id)->id;
        $comment = new comment;
        $comment->description = $request->input('description');
        $comment->user_id = $userId;
        $comment->event_id = $eventId;
        // $comment->user_name=Auth::user()->name;
        $comment->save();
        $event = Event::find($id);
        return redirect('/show-events/' . $id);
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
