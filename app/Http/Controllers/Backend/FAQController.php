<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AppConfig;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Program;
use App\Models\Faq;
use App\Services\TypeService;

class FAQController extends Controller
{
    private $typeService;

    public function __construct(TypeService $typeService)
    {
        $this->typeService = $typeService;
    }
    public function index()
    {
        $faq_lists = Faq::all();

        return view('backend.faq.view', compact('faq_lists'));
    }

    public function Add()
    {
        $data['faq_types'] = $this->typeService->typeList('category');
        // dd($data['faq_types']);
        // dd($data['faq_types']->value);
        // dd(config('configure.category')[0]['id']);
        // $data['faq_types'] = config('configure.category');
        // $data['categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        $data['programs'] = Program::all();
        
        return view('backend.faq.add')->with($data);
    }

    public function Store(Request $request)
    {
        $request->validate([
            'faq_type' => 'required',
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Faq();
        $faq->faq_type = $request->faq_type;

        if (!is_null($request->faculty_id)) {
            $faq->ref_id = $request->faculty_id;
        } else if (!is_null($request->dept_id)) {
            $faq->ref_id = $request->dept_id;
        } else if (!is_null($request->program_id)) {
            $faq->ref_id = $request->program_id;
        } else if (!is_null($request->chsr_id)) {
            $faq->ref_id = $request->chsr_id;
        } else if (!is_null($request->cpc_id)) {
            $faq->ref_id = $request->cpc_id;
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status ?? 0;
        
        $faq->save();

        return redirect()->route('setup.faq')->with('success', 'FAQ added successfully!');
    }

    public function Edit($id)
    {
        $data['editData'] = Faq::find($id);
        //$data['categories'] = ProgramCategory::all();
        // $data['faq_types'] = config('configure.category');

        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        $data['programs'] = Program::all();
        return view('backend.faq.add', $data);
    }

    public function Update(Request $request, $id)
    {
        $faq = Faq::find($id);
        $faq->faq_type = $request->faq_type;

        if (!is_null($request->faculty_id)) {
            $faq->ref_id = $request->faculty_id;
        } else if (!is_null($request->dept_id)) {
            $faq->ref_id = $request->dept_id;
        } else if (!is_null($request->program_id)) {
            $faq->ref_id = $request->program_id;
        } else if (!is_null($request->chsr_id)) {
            $faq->ref_id = $request->chsr_id;
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status ?? 0;
        // dd($faq->toArray());
        $faq->save();
        return redirect()->route('setup.faq')->with('success', 'Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Faq::find($request->id);
        $data->delete();

        return redirect()->route('setup.faq')->with('success', 'Data Deleted successfully');
    }

    //ajax
    public function multipleFacultyWiseDepartment(Request $request)
    {
        if (!$request->faculty_id) {
            $request->faculty_id = [];
        }
        $facultyWiseDepartment = Department::whereIn('faculty_id', $request->faculty_id)->get();
        return response()->json($facultyWiseDepartment);
    }

    //ajax
    public function multipleDepartmentWiseProgram(Request $request)
    {
        if (!$request->department_id) {
            $request->department_id = [];
        }
        $departmentWiseProgram = Program::whereIn('department_id', $request->department_id)->get();
        return response()->json($departmentWiseProgram);
    }
}
