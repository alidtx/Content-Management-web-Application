<?php

namespace App\Http\Controllers\Backend\RegulatoryBody;

use App\Http\Controllers\Controller;
use App\Models\CommitteType;
use Illuminate\Http\Request;

class RegulatoryCommitteSetupController extends Controller
{
    public function index()
    {
        $committee = CommitteType::all();
        // return $committee;
        return view('backend.regulatory-bodies.committee-type.view',compact('committee'));
    }

    public function create()
    {
        $committee = CommitteType::all();
        // return $committee;
        return view('backend.regulatory-bodies.committee-type.add',compact('committee'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:committe_types,name'
        ]);

        $new_committee = new CommitteType();
        $new_committee->name = $request->name;
        $new_committee->save();
        return redirect()->route('regulatory_bodies.committe.member.setup')->with('success','New Committee Added Successfully!');
    }

    public function edit($id)
    {
        $editData = CommitteType::find($id);
        return view('backend.regulatory-bodies.committee-type.add',compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|unique:committe_types,name,'.$id
        ]);

        $find_committee = CommitteType::find($id);
        $find_committee->name = $request->name;
        $find_committee->save();
        return redirect()->route('regulatory_bodies.committe.member.setup')->with('success','New Committee Updated Successfully!');
    }
}
