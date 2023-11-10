<?php

namespace App\Http\Controllers\Backend\RegulatoryBody;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\RegulatoryCommitte;
use App\Services\RegulatoryBody\RegulatoryBodyService;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    private $RegulatoryBodyService;
    public function __construct(RegulatoryBodyService $RegulatoryBodyService)
    {
        $this->RegulatoryBodyService = $RegulatoryBodyService;
    }
    public function index()
    {
        $committes = $this->RegulatoryBodyService->getAll();

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

      $msg =  $this->RegulatoryBodyService->create($request);

        if($msg['type'] == 'error'){
            return redirect()->route('regulatory_bodies.senate.committee.member')->with($msg['type'],'User already Exists');
        } else if($msg['type'] == 'success') {
            return redirect()->route('regulatory_bodies.senate.committee.member')->with($msg['type'],'Data Saved successfully');

        }

    }

    public function edit($id)
    {

        $data['editData'] = RegulatoryCommitte::findOrFail($id);
        $d = RegulatoryCommitte::where('committe_type_id', $data['editData']->committe_type_id)->pluck('profile_id')->toArray();
        $res = array_diff($d,[$data['editData']->profile_id]);
        $data['profiles'] = Profile::whereNotIn('id',$res)->get();
        return view('backend.regulatory-bodies.senate-committee-member.add',$data);
    }

    public function update(Request $request, $id)
    {
        $this->RegulatoryBodyService->update($request, $id);

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
