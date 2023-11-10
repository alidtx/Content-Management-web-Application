<?php

namespace App\Http\Controllers\Backend;

use App\Models\DeanInformation; 
use App\Services\DeanInformationService; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeanInformationController extends Controller
{
    
    public function index()
    { 
        $allData = DeanInformationService::List(); 
        return view('backend.dean_office.index', compact('allData'));
    }
    
    public function add()
    {  
        $data = [];
        return view('backend.dean_office.add',$data);
    }
    public function store(Request $request, DeanInformationService $DeanInformation)
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'image' => 'nullable|mimes:jpeg, jpg, gif, png, svg'
        ]);
        $DeanInformation->saveEvent($request);
        return redirect()->route('dean-office.information')->with('success', 'add Successfully');
    }
    public function edit($id)
    {
        $data['editData'] = DeanInformationService::SingleData($id);
    	return view('backend.dean_office.add')->with($data);
    }

    public function update(Request $request, $id, DeanInformationService $DeanInformation)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
            'iamge' => 'nullable|mimes:jpeg, jpg, gif, png, svg'
        ]);
         //dd($request->all());
        $DeanInformation->updateEvent($request, $id);
         
        return redirect()->route('dean-office.information')->with('info','Update Successfully');
    }
    public function status_change(Request $request, DeanInformationService $DeanInformation)
    { 
        
        $DeanInformation->statusChangeEvent($request);
        return redirect()->route('dean-office.information')->with('success', 'Status Update Successfully');
    }
}
