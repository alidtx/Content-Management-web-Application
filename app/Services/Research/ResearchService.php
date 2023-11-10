<?php

namespace App\Services\Research;

use App\Models\CompletedResearch;
use App\Models\OngoingResearch;
use App\Services\IService;

class ResearchService
{
    public function ResearchByType($type_id, $category_id)
    {
        try {
            if($type_id == 'completed_research'){
                $data = CompletedResearch::where('research_for', $category_id)->get();
            }
            else if($type_id == 'ongoing_research'){
                $data = OngoingResearch::where('research_for', $category_id)->get();
            }
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function ResearchDetails($type, $id)
    {
        try {
            if($type == 'completed_research'){
                $data = CompletedResearch::find($id);
            }
            else if($type == 'ongoing_research'){
                $data = OngoingResearch::find($id);
            }
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
