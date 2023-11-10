<?php

namespace App\Http\Controllers\Frontend\BangabandhuChair;

use App\Http\Controllers\Controller;
use App\Services\BangabandhuChair\BBChairAboutService;
use App\Services\BangabandhuChair\BBChairQuoteService;
use App\Services\BangabandhuChair\BBChairResearcherService;
use App\Services\BannerService;
use App\Services\Journal\JournalService;
use App\Services\Research\ResearchService;
use App\Services\Slider\SliderService;
use Illuminate\Http\Request;

class BangabandhuChairController extends Controller
{
    private $bbChairAboutService;
    private $bbChairQuoteService;
    private $bbChairResearcherService;
    private $sliderService;
    private $bannerService;
    private $researchService;
    private $journalService;

    public function __construct(BBChairAboutService $bbChairAboutService, BBChairQuoteService $bbChairQuoteService, BBChairResearcherService $bbChairResearcherService, SliderService $sliderService, BannerService $bannerService, ResearchService $researchService, JournalService $journalService)
    {
        $this->bbChairAboutService = $bbChairAboutService;
        $this->bbChairQuoteService = $bbChairQuoteService;
        $this->bbChairResearcherService = $bbChairResearcherService;
        $this->sliderService = $sliderService;
        $this->bannerService = $bannerService;
        $this->researchService = $researchService;
        $this->journalService = $journalService;
    }
    public function bangabandhuChair()
    {

        $data['about'] = $this->bbChairAboutService->getAll();
        $data['sliders'] = $this->sliderService->getByMasterId($data['about']->slider_id);
        $data['quotes'] = $this->bbChairQuoteService->getAll();
        $data['researchers'] = $this->bbChairResearcherService->getAll();
        $data['researchs'] = $this->bbChairResearcherService->getCompletedResearch();

        return view('frontend.bangabandhu_chair.bb_chair', $data);
    }
    public function bangabandhuChairResearch()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);
        // $data['infos'] = $this->bbChairResearcherService->getOngoingResearch();
        $data['count_completed_research'] = count($this->researchService->ResearchByType('completed_research', 1));
        $data['count_ongoing_research'] = count($this->researchService->ResearchByType('ongoing_research', 1));

        return view('frontend.bangabandhu_chair.bb_chair_research', $data);
    }
    public function bangabandhuChairResearchDetail($type, $id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);
        $data['info'] = $this->researchService->ResearchDetails($type, $id);

        return view('frontend.bangabandhu_chair.bb_chair_research_details', $data);
    }

    public function bangabandhuChairProject()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);

        return view('frontend.bangabandhu_chair.bb_chair_project', $data);
    }
    public function bangabandhuChairCollaboration()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);

        return view('frontend.bangabandhu_chair.bb_chair_collaboration', $data);
    }
    public function bangabandhuChairPublication()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);
        $data['infos'] = $this->journalService->JournalByType(3);

        return view('frontend.bangabandhu_chair.bb_chair_publication', $data);
    }
    public function bangabandhuChairPublicationDetails($id)
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);
        $data['info'] = $this->journalService->JournalDetails($id);

        return view('frontend.bangabandhu_chair.bb_chair_publication_details', $data);
    }
    public function bangabandhuChairGallery()
    {
        $data['banner'] = $this->bannerService->bannerByRefId(16);

        return view('frontend.bangabandhu_chair.bb_chair_gallery', $data);
    }
}
