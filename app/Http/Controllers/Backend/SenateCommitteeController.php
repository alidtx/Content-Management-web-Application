<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\RegulatoryCommitte;
use Illuminate\Http\Request;

class SenateCommitteeController extends Controller
{
    public function index()
    {
        $comitteData = [];
        $committes = RegulatoryCommitte::orderBy('sort','asc')->with(['profile','committeeType'])->get();
        // return $committes;
        // foreach ($committes as $key => $comitte) {
        //      if($comitte->committe_type_id == 1){
        //        array_push($comitteData,$comitte);
        //      }
        // }
        return view('backend.regulatory-bodies.senate-committee-member.view',compact('committes'));

    }
    public function create()
    {
        // $d = RegulatoryCommitte::where('committe_type_id',1)->pluck('profile_id');
        $data['profiles'] = Profile::all();
        return view('backend.regulatory-bodies.senate-committee-member.add',$data);
    }
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'sort' => 'required',
            'committe_type_id' => 'required',
            'post_id' => 'required',
        ]);

        $checkusers = RegulatoryCommitte::where('profile_id',$request->profile_id)->get();
        // return $checkusers;
        if($checkusers){
            foreach ($checkusers as $key => $user) {
                if($user->profile_id == $request->profile_id and $user->committe_type_id == $request->committe_type_id)
                {
                    return back()->with('error','User already Exists');
                }
            }
        }

        // foreach($check_user as $user){
        //     if($user->profile_id == $request->profile_id)
        //     {
        //         // if(($user->committe_type_id == $request->committe_type_id and $user->post_id == $request->post_id) and ($user->committe_type_id == $request->committe_type_id or $user->post_id == $request->post_id))
        //         // {
        //         //     return "user exist";
        //         //     if($user->committe_type_id == $request->committe_type_id and $user->post_id == $request->post_id){
        //         //         return "post exist";
        //         //     }
        //         // }


        //     }

        //     if($user->profile_id == $request->profile_id){
        //         if(($user->committee_id == $request->committee_id) )
        //         {
        //             return "user exist";
        //         }
        //     }
        // }

        $newCommitte = New RegulatoryCommitte();
        $newCommitte->profile_id = $request->profile_id;
        $newCommitte->sort = $request->sort;
        $newCommitte->committe_type_id = $request->committe_type_id;
        $newCommitte->post_id = $request->post_id;
        $newCommitte->save();

        return redirect()->route('regulatory_bodies.senate.committee.member')->with('success','Data Saved successfully');


    }

    public function  edit($id)
    {
        $d = RegulatoryCommitte::where('committe_type_id',1)->pluck('profile_id')->toArray();

        $data['editData'] = RegulatoryCommitte::findOrFail($id);

        $res = array_diff($d,[$data['editData']->profile_id]);

        $data['profiles'] = Profile::whereNotIn('id',$res)->get();

        return view('backend.regulatory-bodies.senate-committee-member.add',$data);
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

        return redirect()->route('regulatory_bodies.senate.committee.member')->with('success','Data Updated successfully');

    }

    public function statusChange(Request $request, $id)
    {
        // return $request->all();
        $data = RegulatoryCommitte::where('id',$id)->first();

        $data->status = $request->status;
        $data->save();

        if($request->status == 1)
        {
            return redirect()->back()->with('success','User status Active');
        }
        else
        {
            return redirect()->back()->with('success','User status inactive');
        }

    }
}
