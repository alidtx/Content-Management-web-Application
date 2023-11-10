<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\Profile;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {

    	$data['traningList'] = Team::with('member')->get();
        return view('backend.team.list',$data);
    }

    public function add()
    {

       $data['teaMember'] = Profile::get();
    	return view('backend.team.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

    	$data           = new Team();
        $data->team_member     = $request->team_member;
        $data->designation     = $request->designation;
        $data->status     = $request->status;
        $data->save();
    	return redirect()->route('manage_team')->with('success','Data Saved successfully');
    }


    public function edit($id)
    {
    	$data['editData'] = Team::find($id);
        $data['teamMember'] =Profile::get();
    	return view('backend.team.edit',$data);
    }

    public function update(Request $request,$id)
    {

        $request->validate([

        ]);

    	$data           = Team::find($id);
        $data->team_member     = $request->team_member;
        $data->designation     = $request->designation;
        $data->status     = $request->status;
        $data->save();
    	return redirect()->route('manage_team')->with('success','Data Updated successfully');
    }

    public function delete(Request $request)
    {
    	$data = Team::find($request->id);
        $data->delete();
        return redirect()->route('manage_team')->with('success','Data Deleted successfully');
    }

}
