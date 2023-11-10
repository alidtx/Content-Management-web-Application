<?php

namespace App\Http\Controllers\Frontend\Chsr;

use App\Http\Controllers\Controller;
use App\Services\Chsr\ChsrAboutService;
use App\Services\Chsr\ChsrSupervisorService;
use App\Services\Message\MessageService;
use App\Services\News\NewsService;
use App\Services\NewsEventNoticeServices;
use App\Services\OfficeService;
use App\Services\Slider\SliderService;
use App\Services\VideoGalleryService;
use Illuminate\Http\Request;

class ChsrController extends Controller
{
    private $chsrAboutService;
    private $sliderService;
    private $messageService;
    private $officeService;
    private $chsrSupervisorService;
    private $newsEventNoticeServices;
    private $videoGalleryService;

    public function __construct(ChsrAboutService $chsrAboutService , SliderService $sliderService, MessageService $messageService, OfficeService $officeService, ChsrSupervisorService $chsrSupervisorService, NewsEventNoticeServices $newsEventNoticeServices, VideoGalleryService $videoGalleryService)
    {
        $this->chsrAboutService = $chsrAboutService;
        $this->officeService = $officeService;
        $this->sliderService = $sliderService;
        $this->messageService = $messageService;
        $this->chsrSupervisorService = $chsrSupervisorService;
        $this->newsEventNoticeServices = $newsEventNoticeServices;
        $this->videoGalleryService = $videoGalleryService;
    }
    public function chsr_home()
    {
        $data['office'] = $this->officeService->getByID(config('configure.chsr'));
        $data['message'] = $this->messageService->getMessageFromHead(3, $data['office']->id);
        $data['about'] = $this->chsrAboutService->getAbout();
        $data['sliders'] = $this->sliderService->getByMasterId($data['office']->slider_id);
        $data['supervisors'] = $this->chsrSupervisorService->getAll();
        $data['ongoing_researches'] = $this->chsrSupervisorService->getOngoingResearch();
        $data['completed_researches'] = $this->chsrSupervisorService->getCompletedResearch();
        $data['news'] = $this->newsEventNoticeServices->getSelectedRange(1,5);
        $data['events'] = $this->newsEventNoticeServices->getSelectedRange(2,5);
        $data['notices'] = $this->newsEventNoticeServices->getSelectedRange(3,5);
        $data['video'] = $this->videoGalleryService->getByID(1);
        // dd($data['supervisors']);
        // dd(config('configure.chsr'));
        return view('frontend.chsr.chsr', $data);
    }


}
