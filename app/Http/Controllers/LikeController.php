<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Club;
use App\Models\User;
use App\Models\Like;

use Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $currenUserId=Auth::user()->id;
        $likes=Like::all();
        $test=false;
        foreach ($likes as $like) {
            if( $like->user_id==$currenUserId){
                if($like->event_id==$id){ //
                    $test=$like;
                }
            }
        }
        if($test==false){
            $like=new like;
            $like->user_id=$currenUserId;
            $like->event_id=$id;
            $like->like_type=1;
            $like->save();
        }
        else{
            $like->delete();
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currenUserId=Auth::user()->id;
        $likes=Like::all();
        $test=false;
        foreach ($likes as $like) {
            if( $like->user_id==$currenUserId){
                if($like->event_id==$id){
                    $test=$like;
                }
            }
        }
        if($test==false){
            $like=new like;
            $like->user_id=$currenUserId;
            $like->event_id=$id;
            $like->like_type=0;
            $like->save();
        }
        else{
            $like->delete();
        }
        return redirect()->back();
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
        //
    }
}
