<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Research\ResearchService;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    private $researchService;
    public function __construct(ResearchService $researchService)
    {
        $this->researchService = $researchService;
    }
    public function researchByType(Request $request)
    {
        $data['infos'] = $this->researchService->ResearchByType($request->research_type, $request->category_id);
        return view('frontend.research.research_by_type', $data);
    }
}
