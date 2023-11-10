<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\LandingModal; 
use App\Services\LandingModalService; 

class LandingModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $allData = LandingModalService::LandingModalList();  
        return view('backend.landng_modal.index', compact('allData'));
    }
    public function addmodal()
    {  
        $data = [];
        return view('backend.landng_modal.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LandingModalService $LandingModal)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]); 
        $LandingModal->saveEvent($request);
        return redirect()->route('landing-modal.modal_list')->with('success', 'Add Successfully');
    }
    public function edit($id)
    {     
        $singleData = LandingModalService::ModlSingleData($id);   
        return view('backend.landng_modal.add', compact('singleData'));
    }

    
    public function update(Request $request, $id, LandingModalService $LandingModal)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'], 
        ]);
        $LandingModal->updateEvent($request, $id);
        return redirect()->route('landing-modal.modal_list')->with('success', 'Edited Successfully');
    }
    public function status_change(Request $request, LandingModalService $LandingModal)
    { 
        
        $LandingModal->statusChangeEvent($request);
        return redirect()->route('landing-modal.modal_list')->with('success', 'Status Updated Successfully');
    }

     
}
