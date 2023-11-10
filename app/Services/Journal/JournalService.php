<?php

namespace App\Services\Journal;

use App\Models\JournalPaper;
use App\Services\IService;

class JournalService
{
    public function JournalByType($type_id)
    {
        try {
            $data = JournalPaper::where('journal_for', $type_id)->get();
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function JournalDetails($id)
    {
        try {
            $data = JournalPaper::find($id);
            return $data;
        } catch (\Exception $e) {
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
