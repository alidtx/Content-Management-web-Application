<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\OngoingResearch;
use Illuminate\Http\Request;

class OngoingResearchController extends Controller
{


    public function index()
    {
        $data['ongoingResearches'] = OngoingResearch::get();

        // dd($data['ongoingResearches']);

        return view('backend.ongoing_research.view', $data);
    }

    public function add()
    {

    	return view('backend.ongoing_research.add');
    }

    public function store(Request $request)
    {
    //    dd($request->all());

        $request->validate([

        ]);
        $data = new OngoingResearch();
        $data->title = $request->title;
        $data->profile_id = $request->profile_id;
        $data->research_for = $request->research_for;
        $data->pi_co = $request->author;
        $data->date = $request->date;
        $data->area_research = $request->area_of_research;
        $data->source_fund = $request->source_of_fund;
        $data->status = $request->status;

        if ($request->image) {
            $config = array(
                'name'      => "image",
                'path'      => 'upload/journal',
                'width'     => 350,
                'height'    => 528
            );
            $image = ImageHelper::uploadImage($config);
            $data->image = $image['filename'];
        }

        if ($request->file) {
            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/journal'), $fileName);
            $data->file = $fileName;
        }

        $data->save();
         return redirect()->route('news.ongoing_research')->with('success', 'Ongoing Research Added Successfully.');
    }



    public function edit($id)
    {
        $data['editData'] = OngoingResearch::find($id);
        // dd($data['editData']);
        return view('backend.ongoing_research.edit', $data);

    }



    public function update(Request $request,$id)
    {
        // dd($request->all());
        $request->validate([

        ]);

        $data = OngoingResearch::find($id);
        $data->title = $request->title;
        $data->profile_id = $request->profile_id;
        $data->research_for = $request->research_for;
        $data->pi_co = $request->author;
        $data->date = $request->date;
        $data->area_research = $request->area_of_research;
        $data->source_fund = $request->source_of_fund;
        $data->status = $request->status;

        if ($request->image) {
            @unlink(public_path('upload/journal/' . $data->image));
            $config = array(
                'name'      => "image",
                'path'      => 'upload/journal',
                'width'     => 350,
                'height'    => 528
            );
            $image = ImageHelper::uploadImage($config);
            $data->image = $image['filename'];
        }

        if ($request->file) {
            @unlink(public_path('upload/journal/' . $data->file));
            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/journal'), $fileName);
            $data->file = $fileName;
        }

        $data->update();
        
        return redirect()->route('news.ongoing_research')->with('success', 'Ongoing Research Updated Successfully.');

    }
}
