<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramCategory;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Program;

class ChsrProgramController extends Controller
{
    public function index()
    {
        $chsr_program = Program::with(['program_category','faculty','department'])->whereIn('program_category_id',[5,6])->get();
        return view('backend.chsr_program.mphil.list',compact('chsr_program'));
    }
    public function create()
    {
        $data['categories'] = ProgramCategory::all();
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        return view('backend.chsr_program.mphil.add',$data);
    }
    public function store()
    {

    }
}
