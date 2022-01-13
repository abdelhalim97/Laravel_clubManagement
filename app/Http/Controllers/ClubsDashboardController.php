<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\User;
use Redirect;
use File;
class ClubsDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::paginate(6);

        return view('admin.club.clubs-dashboard', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.club.dashboard-add-club', compact('users'));
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
        $club=Club::find($id);
        $userLeaderId=Club::find($id)->user_id;
        $users=User::all();
        return view('admin.club.club-dashboard',compact('club','users','userLeaderId'));
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000','min:100'],
            'user_id' => ['required','numeric' ],
            // 'img' => ['required' ],
        ]);
        $club=Club::find($id);
        $clubs=Club::all();
        $test=false;

            if($request->file('img')!=null){
                if(File::exists("images/".$club->image)){
                    unlink("images/".$club->image);
                }
                $newImageName = time().'-'.$request->name.'.'.$request->file('img')->extension();
                $request->file('img')->move(public_path('images') ,$newImageName);
                $club->image=$newImageName;
            }

        foreach ($clubs as $clubb ) {
            if($clubb->user_id==$request->input('user_id') && $clubb->id!=$id){
                $test=true;
            }
        }
        if($test && $club->user_id!=$request->input('user_id')){
            return Redirect::back()->withErrors(['msg' => 'This User is Already a Leader']);
        }
        else{
            $club->name=$request->input('name');
            $club->description=$request->input('description');
            $club->user_id=$request->input('user_id');
            $club->save();
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club=Club::find($id);
        unlink("images/".$club->image);
        $club->delete();
        return redirect('/dashboard/clubs-dashboard');
    }
}
