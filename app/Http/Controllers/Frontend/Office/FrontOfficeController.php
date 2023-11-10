<?php

namespace App\Http\Controllers\Frontend\Office;

use App\Http\Controllers\Controller;
use App\Models\PersonnelsToOffice;
use App\Models\ProfileBiography;
use App\Models\SocialMediaLink;
use App\Services\BannerService;
use Illuminate\Http\Request;

class FrontOfficeController extends Controller
{
    private $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    public function officePeople()
    {

        $data['profiles'] = PersonnelsToOffice::with('office')->select('office_id')->distinct()->get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        return view('frontend.office.office_people', $data);
    }

    public function officePeopleDetails($id)
    {
        $data['profile'] = PersonnelsToOffice::with(['profile', 'office' => function ($q) {
            $q->select('ucam_office_id', 'name');
        }])->findOrFail($id);
        $data['biographys'] = ProfileBiography::where('profile_id', $data['profile']->id)->get();
        $data['social'] = SocialMediaLink::where('profile_id', $data['profile']->id)->first();
        $data['banner'] = $this->bannerService->bannerByRefId(1);

        //    return $data;
        return view('frontend.office.people_details', $data);
    }
}
