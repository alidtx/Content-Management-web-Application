<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutInternationalAffair;
use App\Models\Page;
use App\Models\OefcdFacultyDevelopmentProgram;
use App\Models\OefcdTrainer;
use App\Models\Profile;
use Illuminate\Http\Request;


class OEFCDController extends Controller
{
    public function index()
    {
        return view('backend.oefcd.view');
    }

    public function internationalAffair()
    {
        return view('backend.oefcd.international_affair.index');
    }

    public function aboutInternationalAffair()
    {
        $data = AboutInternationalAffair::first();
        return view('backend.oefcd.international_affair.about', compact('data'));
    }

    public function aboutInternationalAffairUpdate($id, Request $request)
    {
        // return $request->all();
        $data = AboutInternationalAffair::findOrFail($id);
        // return $data;
        if(!empty($data)){
        //    $data->mission_vision = $request->mission_vision;
           $data->content = $request->content;
           $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    public function postList()
    {
        $posts = Page::with('menu_type')->where('type', 6)->where('status','1')->get();
        return view('backend.post.post-view', compact('posts'));
    }
    public function contact()
    {
        // return "contact page under constructio";
        // $posts = Page::with('menu_type')->where('type', 6)->where('status','1')->get();
        return view('backend.oefcd.international_affair.contact');
    }


    // faculty  de
    public function development_program()
    {
        $data = OefcdFacultyDevelopmentProgram::first();
        return view('backend.oefcd.development_program.index', compact('data'));
    }
    public function development_program_update($id, Request $request)
    {
        // return $request->all();
        $data = OefcdFacultyDevelopmentProgram::findOrFail($id);
        // return $data;
        if(!empty($data)){
           $data->mission_vision = $request->mission_vision;
           $data->content = $request->content;
           $data->save();
        }
        return redirect()->back()->with('success', 'Data updated Successfully');
    }

    public function trainerList()
    {
        $trainer_list = OefcdTrainer::with('profile','designation')->get();
        return view('backend.oefcd.trainer.list', compact('trainer_list'));
    }

    public function create()
    {
        $trainer_list = Profile::all();
        return view('backend.oefcd.trainer.add', compact('trainer_list'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
        ],[
            'profile_id.required' => 'Please Choose a Member'
        ]);

        $trainer_list = new OefcdTrainer();
        $trainer_list->profile_id = $request->profile_id;
        $trainer_list->rank = $request->rank;
        $trainer_list->designation_id = $request->designation_id;
        $trainer_list->status = $request->status;

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.trainer.list')->with('success','Trainer Added successfully');

    }

    public function edit($id)
    {
        $trainer_list = Profile::all();
        $editData = OefcdTrainer::findOrFail($id);
        return view('backend.oefcd.trainer.add', compact('editData','trainer_list'));
    }

    public function update($id, Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
        ],[
            'profile_id.required' => 'Please Choose a Member'
        ]);

        $trainer_list = OefcdTrainer::find($id);
        $trainer_list->profile_id = $request->profile_id;
        $trainer_list->rank = $request->rank;
        $trainer_list->designation_id = $request->designation_id;
        $trainer_list->status = $request->status;

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.trainer.list')->with('success','Trainer Update successfully');

    }


}
