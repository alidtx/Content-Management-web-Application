<?php

namespace App\Http\Controllers\Frontend\Academics;

use App\Http\Controllers\Controller;

use App\Models\AcademicCommitteeMemberController; 
use App\Models\AcademicCalenderController; 
use App\Models\AcademicCalender;
use App\Models\Department;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\ProgramCategory;

use Illuminate\Http\Request;

class FrontAcademicsController extends Controller
{
    //
    public function index()
    {   
        $data['programs'] = $this->programsInfo();
        $data['program_categories'] = ProgramCategory::all(); 
        $data['faculties'] = Faculty::all();  
        return view('frontend.academics.index', $data);
    }
    public function academics_details($id)
    {    
        $data['info'] = Program::join('program_categories','program_categories.id','program_category_id')
        ->join('faculties','faculties.id','faculty_id')
        ->join('departments','departments.id','department_id')
        ->select('programs.*','faculties.name as fname','departments.name as dname','program_categories.program_category as pcname')
        ->where('programs.id', $id)->first(); 
        $data['program_categories'] = ProgramCategory::all(); 
        $data['faculties'] = Faculty::all();  
        return view('frontend.academics.academics_details', $data);
    }

    public function academics_srch(Request $request)
    {          
        $data['programs'] = Program::leftJoin('program_categories','program_categories.id', 'programs.program_category_id')
        ->leftJoin('faculties', 'faculties.id', 'programs.faculty_id')
        ->leftJoin('departments', 'departments.id', 'programs.department_id')
        ->select('programs.*', 'program_categories.program_category') 
        ->when($request,function($query,$request){
            if($request->program != null){
                $query->where('programs.program_category_id',$request->program);
            }
        })
        ->when($request,function($query,$request){
            if($request->faculty != null){
                $query->where('programs.faculty_id', $request->faculty);
            }
        })
        ->get();  
        //dd($request->faculty);
        return response()->json($data['programs']);
         
    }

    private function programsInfo()
    {   
        $details = Program::join('program_categories','program_categories.id','program_category_id')
        ->select('programs.*','program_categories.program_category')
        ->get();  
        return $details;
    }
 
}
