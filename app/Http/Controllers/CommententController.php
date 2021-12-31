<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\Event;
use App\Models\Comment;

use App\Models\UserClub;
use Auth;
use Redirect;
class CommententController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
        return redirect('/show-clubs/club/'.$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        $currentUserID=Auth::user()->id;
        if($currentUserID==$comment->user_id){
            $comment->delete();
        }
        else{
            Redirect::back()->withErrors(['msg' => 'This Comment isn\'t yours']);
        }
        return redirect()->back();

    }
}
