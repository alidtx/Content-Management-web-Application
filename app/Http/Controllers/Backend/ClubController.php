<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Department;
use App\Models\News;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('faculty','department','events')->get();
        return view('backend.club.view',compact('clubs'));
    }

    public function club_event_list($id)
    {
        try {
            $data['news'] = News::where('club_id', $id)->get();
            return view('backend.news.news-view')->with($data);

            // return view('backend.club.view',compact('clubs'));
        } catch (\Exception $e) {
            return redirect()->with('error', $e->getMessage());

        }

    }

    public function create()
    {
        return view('backend.club.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['establish_date'] = date('Y-m-d H:i:s',strtotime($request->establish_date));
        $request->validate([
           'name' => 'required|unique:clubs,name'
        ]);
        $config = array(
            'name'      => "banner",
            'path'      => 'upload/banner',
            'width'     => 750,
            'height'    => 450
        );
        $images = ImageHelper::uploadImage($config);
        $data['banner'] = $images['filename'];
        // dd($data);
        Club::create($data);
        return redirect()->route('club.list')->with('success','Club Added');
    }

    public function getDepartment($id)
    {
        $dept = Department::where('faculty_id',$id)->get();
        return $dept;
    }

    public function edit($id)
    {
        $editData =  Club::find($id);
        return view('backend.club.add',compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['establish_date'] = date('Y-m-d H:i:s',strtotime($request->establish_date));
        $request->validate([
           'name' => 'required'
        ]);
        $club = Club::find($id);
        if($request->file('banner'))
        {
            @unlink(public_path('upload/banner/'.$club->banner));
            $config = array(
                'name'      => "banner",
                'path'      => 'upload/banner',
                'width'     => 750,
                'height'    => 450
            );
            $images = ImageHelper::uploadImage($config);
            $data['banner'] = $images['filename'];
        }

        // dd($data);
        $club->update($data);
        return redirect()->route('club.list')->with('success','Club Updated Successfully');
    }
}
