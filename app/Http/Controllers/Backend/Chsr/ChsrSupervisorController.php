<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;
use App\Services\Chsr\ChsrSupervisorService;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

class ChsrSupervisorController extends Controller
{
    private $profileService;
    private $chsrSupervisorService;

    public function __construct(ProfileService $profileService, ChsrSupervisorService $chsrSupervisorService)
    {
        $this->profileService = $profileService;
        $this->chsrSupervisorService = $chsrSupervisorService;
    }
    public function index()
    {
        $data['supervisor_list'] = $this->chsrSupervisorService->getAll();
        return view('backend.chsr_supervisor.list', $data);
    }

    public function create()
    {
        $data['categories'] = ProgramCategory::whereIn('id', [5, 6])->get();
        $data['profiles'] = $this->profileService->getFacultyPersonnel();
        return view('backend.chsr_supervisor.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_id' => 'required',
            'program_category_id' => 'required',
        ], [
            'profile_id.required' => 'Please Choose a Supervisor',
            'program_category_id.required' => 'Please Choose a Program',
        ]);

        $this->chsrSupervisorService->create($request);

        return redirect()->route('chsr.supervisor.list');
    }

    public function edit($id)
    {
        $data['categories'] = ProgramCategory::whereIn('id', [5, 6])->get();
        $data['editData']  = $this->chsrSupervisorService->getByID($id);
        $data['profiles'] = $this->profileService->getFacultyPersonnel();
        // $data['programs'] = Program::all();
        // $data['profiles'] = Profile::where('personnel_type', 1)->get();
        return view('backend.chsr_supervisor.add', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_id' => 'required',
            'program_category_id' => 'required',
        ], [
            'profile_id.required' => 'Please Choose a Supervisor',
            'program_category_id.required' => 'Please Choose a Program',
        ]);

        $this->chsrSupervisorService->update($request, $id);

        return redirect()->route('chsr.supervisor.list');
    }

    public function delete(Request $request)
    {
        $this->chsrSupervisorService->delete($request->id);
        return redirect()->back();
    }
}
