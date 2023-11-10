<?php

namespace App\Http\Controllers\Backend\Program;

use App\Http\Controllers\Controller;
use App\Services\Program\ProgramService;
use Illuminate\Http\Request;

class ProgramFromApiController extends Controller
{
    private $programService;

    public function __construct(ProgramService $programService)
    {
        $this->programService = $programService;
    }
    public function index()
    {
        $clientdata = $this->programService->getApiProgramData();
        return view('backend.program.from_api.view', compact('clientdata'));
    }
    public function store()
    {
        $this->programService->storeApiProgramData();
        return redirect()->back()->with('success','Data Inserted Successfully');
    }
}
