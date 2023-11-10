<?php

namespace App\Http\Controllers\Frontend\RegulatoryBody;

use App\Http\Controllers\Controller;
use App\Models\CommitteType;
use App\Models\RegulatoryCommitte;
use App\Models\Role;
use App\Services\BannerService;
use App\Services\RegulatoryBody\RegulatoryBodyService;
use Illuminate\Http\Request;

class RegulatoryBodyController extends Controller
{
    private $RegulatoryBodyService;
    private $bannerService;
    public function __construct(RegulatoryBodyService $RegulatoryBodyService, BannerService $bannerService)
    {
       $this->RegulatoryBodyService = $RegulatoryBodyService;
       $this->bannerService = $bannerService;
    }

    public function regulatory_body($committe_type)
    {
        $data['committee'] = CommitteType::findOrFail($committe_type);
        $data['members'] = $this->RegulatoryBodyService->getMemberCommitteeTypeWise($committe_type);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.regulatories_body.member_list', $data);
    }

}
