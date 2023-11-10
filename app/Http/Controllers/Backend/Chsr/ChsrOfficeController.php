<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\ChsrOffice;
use App\Models\Faculty;
use Auth;

class ChsrOfficeController extends Controller
{
    public function index()
    {
        $chsr = [];
        // dd( $chsr['data']->toArray());
        return view('backend.chsr_office.view');
    }

    public function deanList()
    {
        $dean_infos  = ChsrOffice::with('profile','designations')->where('chsr_office_category', 1)->get();
        $name = "Dean";
        return view('backend.chsr_office.member_list',compact('dean_infos','name'));
    }
    public function directorList()
    {
        $name = "Director";
        $dean_infos = ChsrOffice::with('profile','designations')->where('chsr_office_category', 2)->get();
        return view('backend.chsr_office.member_list',compact('dean_infos','name'));
    }
    public function deputyDirectorList()
    {
        $name = "Deputy Director";
        $dean_infos = ChsrOffice::with('profile','designations')->where('chsr_office_category', 3)->get();
        return view('backend.chsr_office.member_list',compact('dean_infos','name'));
    }
    public function assistantDirectorList()
    {
        $name = "Assistant Director";
        $dean_infos = ChsrOffice::with('profile','designations')->where('chsr_office_category', 4)->get();
        return view('backend.chsr_office.member_list',compact('dean_infos','name'));
    }
    public function officerList()
    {
        $name = "Officer";
        $dean_infos = ChsrOffice::with('profile','designations')->where('chsr_office_category', 5)->get();
        return view('backend.chsr_office.member_list',compact('dean_infos','name'));
    }

    public function create()
    {
        $profiles = Profile::all();
        return view('backend.chsr_office.add',compact('profiles'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $office = new ChsrOffice();
        $office->chsr_office_category = $request->chsr_office_category;
        $office->profile_id           = $request->profile_id;
        $office->email          = $request->email;
        $office->designation_id = $request->designation_id;
        $office->room_no        = $request->room_no;
        $office->created_by     = Auth::user()->id;

        // dd($office);
        $office->save();
        return redirect()->back()->with('success','Data save success');
    }

    public function edit($id)
    {
        $editData = ChsrOffice::find($id);
        $profiles = Profile::all();
        return view('backend.chsr_office.add', compact('editData','profiles'));
    }

    public function profileWiseRank(Request $request)
    {
       $rank = Profile::where('id', $request->profile_id)->select(['rank','email'])->first();
        if(empty($rank)){
            return "N/A";
        }
        return $rank;
    }
}
