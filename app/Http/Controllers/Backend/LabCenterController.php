<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LabCenter;
use App\Services\LabCenterService;

class LabCenterController extends Controller
{
    

    public function index()
    {
        $allData = LabCenterService::LabCenterList();
        return view('backend.lab_center.index', compact('allData'));
    }
    public function addlab()
    {
        $data = [];
        return view('backend.lab_center.add',$data);
    }
    public function store(Request $request, LabCenterService $LabCenter)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        $LabCenter->saveEvent($request);
        return redirect()->route('lab-center.list')->with('success', 'Lab Center add Successfully');
    }
    public function edit($id)
    {
        $singleData = LabCenterService::LabCenterSingleData($id);
        return view('backend.lab_center.add', compact('singleData'));
    }

    public function update(Request $request, $id, LabCenterService $LabCenter)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);
        $LabCenter->updateEvent($request, $id);
        return redirect()->route('lab-center.list')->with('success', 'Lab Center edit Successfully');
    }

    public function status_change(Request $request, LabCenterService $LabCenter)
    {

        $LabCenter->statusChangeEvent($request);
        return redirect()->route('lab-center.list')->with('success', 'Lab Center Status Update Successfully');
    }
}
