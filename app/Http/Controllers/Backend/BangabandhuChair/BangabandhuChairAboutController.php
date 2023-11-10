<?php

namespace App\Http\Controllers\Backend\BangabandhuChair;

use App\Http\Controllers\Controller;
use App\Services\BangabandhuChair\BBChairAboutService;
use App\Services\Profile\ProfileService;
use App\Services\Slider\SliderMasterService;
use Illuminate\Http\Request;

class BangabandhuChairAboutController extends Controller
{
    private $bbChairAboutService;
    private $profileService;
    private $sliderMasterService;

    public function __construct(BBChairAboutService $bbChairAboutService, ProfileService $profileService, SliderMasterService $sliderMasterService)
    {
        $this->bbChairAboutService = $bbChairAboutService;
        $this->profileService = $profileService;
        $this->sliderMasterService = $sliderMasterService;
    }
    public function index()
    {
        $data['sliderMasters'] = $this->sliderMasterService->getAll();
        $data['profiles'] = $this->profileService->getAll();
        $data['editData'] = $this->bbChairAboutService->getAll();

        return view('backend.bb_chair.bb_chair_about.add', $data);
    }
    public function store(Request $request)
    {
        $this->bbChairAboutService->create($request);

        return redirect()->route('bangabandhu_chair.about')->with('success','Data stored successfully');
    }

    public function update(Request $request, $id)
    {
        $this->bbChairAboutService->update($request,$id);

        return redirect()->route('bangabandhu_chair.about')->with('success','Data Update successfully');

    }
}
