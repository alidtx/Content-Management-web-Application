<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use App\Models\ChsrAdmissionRequirement;
use Illuminate\Http\Request;

class ChsrProgramAdmissionRequirementController extends Controller
{
     public function create()
     {
        $data = ChsrAdmissionRequirement::first();
        return view('backend.chsr_admission.create',compact('data'));
     }
     public function store(Request $request)
     {
        $request->validate([
            'for_phd' => 'required',
            'for_mphil' => 'required',
        ]);

        $data = ChsrAdmissionRequirement::first();
        $data->for_phd = $request->for_phd;
        $data->for_mphil = $request->for_mphil;
        $data->save();
        return redirect()->back()->with('success','Data update successfully!');
     }
}
