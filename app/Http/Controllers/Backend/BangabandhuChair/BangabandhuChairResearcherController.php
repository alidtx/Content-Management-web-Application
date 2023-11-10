<?php

namespace App\Http\Controllers\Backend\BangabandhuChair;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Services\BangabandhuChair\BBChairResearcherService;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

class BangabandhuChairResearcherController extends Controller
{
    private $bbChairResearcherService;
    private $profileService;

    public function __construct(BBChairResearcherService $bbChairResearcherService, ProfileService $profileService)
    {
        $this->bbChairResearcherService = $bbChairResearcherService;
        $this->profileService = $profileService;
    }

    public function index()
    {
         $data['researchers'] = $this->bbChairResearcherService->getAll();

        return view('backend.bb_chair.bb_chair_researcher.index', $data);
    }
    public function create()
    {
        // $data['profiles'] = Profile::all();
        $data['profiles'] = $this->profileService->getAll();

        return view('backend.bb_chair.bb_chair_researcher.add', $data);
    }
    public function store(Request $request)
    {
        $this->bbChairResearcherService->create($request);

        return redirect()->route('bangabandhu_chair.researcher')->with('success','Data stored successfully');
    }
    public function edit($id){
        $data['profiles'] = $this->profileService->getAll();
        $data['editData']=$this->bbChairResearcherService->getByID($id);

        return view('backend.bb_chair.bb_chair_researcher.add', $data);
    }
    public function update(Request $request, $id)
    {
        $this->bbChairResearcherService->update($request,$id);

        return redirect()->route('bangabandhu_chair.researcher')->with('success','Data Update successfully');

    }
    public function delete(Request $request){
        // dd($request->id);
        $this->bbChairResearcherService->delete($request->id);
        return redirect()->back();
    }

    public function researchList()
    {
         $data['researchs'] = $this->bbChairResearcherService->getCompletedResearch();

        //  dd($data['researchs']);

        return view('backend.bb_chair.bb_chair_research.index', $data);
    }
}
