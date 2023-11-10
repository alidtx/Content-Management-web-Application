<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use App\Models\CompletedResearch;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\OngoingResearch;
use App\Models\PersonalToResearch;
use App\Models\Profile;
use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;

class ChsrResearcherController extends Controller
{
     public function index()
     {
        $researcher_list = PersonalToResearch::with('profile','program_category','faculty','department')->latest()->get(); // get personnel_type = 1
        // dd($researcher_list->toArray());
        return view('backend.chsr_researcher.list',compact('researcher_list'));

     }

     public function viewSingle($id)
     {
        $single_data = PersonalToResearch::with('profile','program_category','faculty','department')->find($id);
        return view('backend.chsr_researcher.single_view',compact('single_data'));
     }

     public function create()
     {
        $data['categories'] = ProgramCategory::whereIn('id',[5,6])->get();
        $data['programs'] = Program::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        $data['profiles'] = Profile::where('personnel_type', 1)->get();
        return view('backend.chsr_researcher.add',$data);
    }

    public function categoryWiseProgram(Request $request)
    {

        if (isset($request->program_category_id)){

            try {
                $data = Program::where('program_category_id', $request->program_category_id)->get();
                return response()->json($data ,200);

            } catch (\Throwable $th) {
                return response()->with('error',$th->getMessage());
            }
        }
     }

     public function store(Request $request)
     {
        // return $request->all();
        $request->validate([
          'profile_id' => 'required',
          'program_category_id' => 'required',
          'faculty_id' => 'required',
          'department_id' => 'required',
        ],[
            'profile_id.required' => 'Please Choose a researcher',
            'program_category_id.required' => 'Please Choose a Program',
            'faculty_id.required' => 'Please Choose a Faculty',
            'department_id.required' => 'Please Choose a Department',
        ]);

        $reseracher = new PersonalToResearch();
        $reseracher->profile_id = $request->profile_id;
        $reseracher->program_category_id = $request->program_category_id;
        $reseracher->faculty_id = $request->faculty_id;
        $reseracher->department_id = $request->department_id;
        $reseracher->save();

        return redirect()->route('chsr.researcher.list');
     }

     public function edit($id)
     {
        $data['categories'] = ProgramCategory::whereIn('id',[5,6])->get();
        $data['programs'] = Program::all();
        $data['editData']  = PersonalToResearch::find($id);
        $data['profiles'] = Profile::where('personnel_type', 1)->get();
        return view('backend.chsr_researcher.add',$data);
     }

     public function projectList() {
        $data['ongoingResearches'] = OngoingResearch::get();
        $data['completedResearches'] = CompletedResearch::with('profile')->orderBy('date', 'desc')->get();
        return view('backend.chsr_researcher.project_list',$data);
     }

}
