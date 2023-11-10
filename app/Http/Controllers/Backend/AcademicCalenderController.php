<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\AcademicCalender;
use App\Models\Department;
use App\Models\Program;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AcademicCalenderController extends Controller
{

    public function index()
    {
        $data['academics'] = AcademicCalender::with(['program','department'])->get();
        //   dd($data['academics']);
        return view('backend.academic_calender.view', $data);
    }


    public function Add()
    {
        $data['editData'] = NULL;
        $data['departments'] = Department::get();
        $data['programs'] = Program::get();
        $data['faculties'] = Faculty::get();
        // $data['designations'] = Designation::where('purpose',3)->get();
        return view('backend.academic_calender.add')->with($data);
    }


    public function Store(Request $request)
    {

        $request->validate([
            
            'session' => 'required',
            'title' => 'required',
            'status' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $data           = new AcademicCalender();
        $data->type_id     = $request->type_id;
        $data->faculty_id     = $request->type_id;
        $data->department_id     = $request->department_id;
        $data->program_id     = $request->program_id;
        $data->session     = $request->session;
        $data->title     = $request->title;
        $data->status     = $request->status;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $ext = $file->extension();
            $file_name = time() . '.' . $ext;
            $file->storeAs('/public/upload/academic/', $file_name);
            $data->file = $file_name;
            // dd($file_name);
        }
        $data->save();

        return redirect()->route('setup.academic_calender')->with('success', 'Academic added Successfully.');
    }


    public function Edit($id)
    {
        $data['departments'] = Department::get();
        $data['programs'] = Program::get();
        $data['faculties'] = Faculty::get();
        $data['editData'] = AcademicCalender::find($id);
        return view('backend.academic_calender.edit')->with($data);
    }


    public function Update(Request $request, $id)
    {

        $request->validate([
            'session' => 'required',
            'title' => 'required',
            'status' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $data           = AcademicCalender::find($id);
        $data->type_id     = $request->type_id;
        $data->faculty_id     = $request->faculty_id;
        $data->department_id     = $request->department_id;
        $data->program_id     = $request->program_id;
        $data->session     = $request->session;
        $data->title     = $request->title;
        $data->status     = $request->status;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $ext = $file->extension();
            $file_name = time() . '.' . $ext;
            $file->storeAs('/public/upload/academic/', $file_name);
            $data->file = $file_name;

        }
        $data->save();

        return redirect()->route('setup.academic_calender')->with('info', 'Academic updated Successfully.');
    }

    public function DepartmentWiseProgram(Request $request)
    {
        $program = Program::where('department_id', $request->department_id)->get();
        // dd($program->toArray());

        if (isset($program)) {
            return response()->json($program);
        } else {
            return response()->json('fail');
        }
    }


}
