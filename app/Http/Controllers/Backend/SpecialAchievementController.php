<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialAchievement;
use App\Services\SpecialAchievementService;

class SpecialAchievementController extends Controller
{
    private $achievementService;

    public function __construct(SpecialAchievementService $achievementService)
    {
        $this->achievementService = $achievementService;
    }
    public function index()
    {
    	$data['achievements'] = $this->achievementService->getAll();
    	return view('backend.achievement.achievement-view')->with($data);

    }

    public function filterStudent()
    {
    	$data['achievements'] = $this->achievementService->filterStudent();
    	return view('backend.achievement.achievement-view')->with($data);
    }

    public function filterTeacher()
    {
    	$data['achievements'] = $this->achievementService->filterTeacher();
    	return view('backend.achievement.achievement-view')->with($data);
    }

    public function filterOrganization()
    {
    	$data['achievements'] = $this->achievementService->filterOrganization();
    	return view('backend.achievement.achievement-view')->with($data);
    }

    public function add()
    {
    	return view('backend.achievement.achievement-add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            // 'image' => 'required',
        ]);
       
        $this->achievementService->create($request);

        return redirect()->back()->with('info', 'Achievement store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = $this->achievementService->getByID($id);
        return view('backend.achievement.achievement-add')->with($data);

    }

    public function update(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            // 'image' => 'required',
        ]);

        $this->achievementService->update($request,$id);
        
        return redirect()->route('special_achievement.list')->with('info','Achievement update successfully.');

    }

    public function delete(Request $request)
    {
        $this->achievementService->delete($request->id);

        return redirect()->route('special_achievement.list');
    }
}