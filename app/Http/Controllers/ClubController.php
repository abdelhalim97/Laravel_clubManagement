<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Club;
use App\Models\Event;
use App\Models\USerClub;
use Auth;
use Redirect;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::paginate(12);
        return view('clubs.show-clubs', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = User::all();
        // return view('clubs.add-club', compact('users'));
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
            'user_id' => ['required','numeric' ],
            'img' => ['required' ],

        ]);
        $club=new club;
        $newImageName = time().'-'.$request->name.'.'.$request->file('img')->extension();
        $request->file('img')->move(public_path('images') ,$newImageName);
        $club->image=$newImageName;
        // $club=Club::create([
        //     'name'=>$request->input('name'),
        //     'description'=>$request->input('description'),
        //     'image'=>$newImageName,
        //     'user_id'=>$request->input('user_id'),
        // ]);
        $clubs=Club::all();
        $test=false;
        foreach ($clubs as $clubt ) {
            if($clubt->user_id==$request->input('user_id')){
                $test=true;
            }
        }
        if($test){
            return Redirect::back()->withErrors(['msg' => 'This User is Already a Leader']);
        }
        else{
            $club->name=$request->input('name');
            $club->description=$request->input('description');
            $club->user_id=$request->input('user_id');
            $club->save();
            return redirect('/show-clubs');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test=false;
        $club = Club::find($id);
        $events=$club->events;
        if(Auth::user()){
            $clubs = Auth::user()->clubs;
            $clubId = Club::find($id)->id;
            foreach ($clubs as $clubTest) {
                if($clubTest->id==$clubId){
                    $test=true;
                }
            }
        }

        return view('clubs.show-club',compact('club','events','test'));
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

    }
}
