<?php

namespace App\Http\Controllers\Frontend\Procurement;

use App;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\Procurement;
use App\Services\ProcurementService\ProcurementService;

class ProcurementController extends Controller
{

    private $procurementService;
    public function __construct(ProcurementService $ProcurementService)
    {
        $this->procurementService = $ProcurementService;
    }

    public function procurement()
    {
        $data['procurement'] = $this->procurementService->getAll();
        // dd($data['procurement']);
        return view('frontend.procurement.procurement', $data);
    }

    public function procurementSingle($id)
    {
        $data['procurementSingle'] = $this->procurementService->getSingle($id);
        return view('frontend.procurement.procurementSingle', $data);
    }
}
