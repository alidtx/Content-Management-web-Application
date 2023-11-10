<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\RegulatoryCommitte;
use Illuminate\Http\Request;

class SyndicateCommitteeMemberController extends Controller
{
    public function index()
    {
        $comitteData = [];
        $committes = RegulatoryCommitte::orderBy('sort','asc')->with('getProfile')->get();
        foreach ($committes as $key => $comitte) {
             if($comitte->committe_type_id == 2){
               array_push($comitteData,$comitte);
             }
        }
        return view('backend.regulatory-bodies.syndicate-committee-member.view',['comitteData'=>$comitteData]);
       
    }
    public function create()
    {
        $d = RegulatoryCommitte::where('committe_type_id',2)->pluck('profile_id');
        $data['profiles'] = Profile::whereNotIn('id',$d)->get(); 
        return view('backend.regulatory-bodies.syndicate-committee-member.add',$data);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'sort' => 'required',
            'committe_type_id' => 'required',
        ]);

        $newCommitte = New RegulatoryCommitte();
        $newCommitte->profile_id = $request->profile_id;
        $newCommitte->sort = $request->sort;
        $newCommitte->committe_type_id = $request->committe_type_id;
        $newCommitte->save();

        return redirect()->route('syndicate.committee.member')->with('success','Data Saved successfully');
 

    }

    public function  edit($id)
    {
        $d = RegulatoryCommitte::where('committe_type_id',2)->pluck('profile_id')->toArray();

        $data['editData'] = RegulatoryCommitte::findOrFail($id);

        $res = array_diff($d,[$data['editData']->profile_id]);

        $data['profiles'] = Profile::whereNotIn('id',$res)->get(); 
        return view('backend.regulatory-bodies.syndicate-committee-member.add',$data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_id' => 'required',
            'sort' => 'required',
            'committe_type_id' => 'required',
        ]);

        $data = RegulatoryCommitte::findOrfail($id);
        $data->profile_id       = $request->profile_id;
        $data->sort             = $request->sort;
        $data->committe_type_id = $request->committe_type_id;
        $data->save();

        return redirect()->route('syndicate.committee.member')->with('success','Data Updated successfully');

    }
}
