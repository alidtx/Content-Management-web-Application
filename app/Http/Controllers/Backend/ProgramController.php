<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProgramCategory;
use App\Models\Program;
use App\Models\Department;
use App\Models\Faculty;
use Image;

class ProgramController extends Controller
{
    public function index()
    {
    	$data['programs'] = Program::with(['program_category','department','faculty'])->get();

        return view('backend.program.view', $data);
    }

    public function Add()
    {
        $data['categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
    	return view('backend.program.add',$data);
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'program_category_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            'program_title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

    	 $params = $request->all();
    	if ($file = $request->file('image'))
        {
            $config = [
                'name'      => "image",
                'path'      => 'upload/program',
                'width'     => 440,
                'height'    => 250
            ];
            $image_file = ImageHelper::uploadImage($config);
            // return$image_file['filename'];
            $params['image'] = $image_file['filename'];
        }
        Program::create($params);
    	return redirect()->route('setup.program')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Program::find($id);
        $data['categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        // return $data;
    	return view('backend.program.add',$data);
    }

    public function Update(Request $request,$id)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'
        // ]);
        $data = Program::find($id);
        $params = $request->all();
        if ($file = $request->file('image'))
        {   if(file_exists(public_path('upload/program/'.$data->image)))
            {
                @unlink(public_path('upload/program/'.$data->image));
            }
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/program'), $filename);
            $image=Image::make(public_path('upload/program/').$filename);
            $image->resize(430,260)->save(public_path('upload/program/').$filename);
            $params['image']= $filename;
        }
        $data->update($params);
    	return redirect()->route('setup.program')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = Program::find($request->id);
        $data->delete();

        return redirect()->route('homepages.event')->with('success','Data Deleted successfully');
    }

    //ajax
    public function facultyWiseDepartment(Request $request)
    {
        $facultyWiseDepartment = Department::where('faculty_id',$request->faculty_id)->get();
        //return $facultyWiseDepartment;
        ///dd($facultyWiseDepartment);
        if(isset($facultyWiseDepartment))
		{
			return response()->json($facultyWiseDepartment);
		}
		else
		{
			return response()->json('fail');
		}
    }

    public function programApprove(Request $request,$id)
    {
        // return $request->all();
        $data = Program::where('id',$id)->first();
        //dd($data);
        // $params = array();
        // $params['is_admission'] = $request->is_admission;
        // $data->update($params);
        $data->is_admission = $request->is_admission;
        $data->save();
        // dd($request->is_admission);
        // dd($data);
        if($request->is_admission == 1)
        {
            return redirect()->back()->with('success','Admission ON Successfully');
        }
        else
        {
            return redirect()->back()->with('success','Admission OFF Successfully');
        }

    }



}
