<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AtAGlanceNumber;
use App\Services\AtAGlanceService;

class AtAGlanceController extends Controller
{
    private $atAGlanceService;

    public function __construct(AtAGlanceService $atAGlanceService)
    {
        $this->atAGlanceService = $atAGlanceService;
    }
    public function index()
    {
        $data['editData'] = $this->atAGlanceService->getFirst();
        return view('backend.at_a_glance.view',$data);
    }

    public function store(Request $request)
    {

        $this->atAGlanceService->create($request);

        return redirect()->route('manage_profile.numbers_at_a_glance')->with('success','Data Saved successfully');
    }

    public function update(Request $request,$id)
    {
            
        $this->atAGlanceService->update($request,$id);

        return redirect()->route('manage_profile.numbers_at_a_glance')->with('success','Data Update successfully');
    }
}
