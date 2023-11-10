<?php

namespace App\Http\Controllers\Frontend\IQAC;

use App\Http\Controllers\Controller;
use App\Models\iqacAbout;
use Illuminate\Http\Request;
use App\Services\Slider\SliderService;
use App\Models\TrainingWorkShopSeminar;
use App\Models\Team;
use App\Models\Document;
use App\Models\Faq;

class IQACController extends Controller
{
    private $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    public function iqacHome()
    {
        $data['iqac_abouts']=iqacAbout::all();
        $data['trainingWorkshopSeminars']=TrainingWorkShopSeminar::get();
        $data['sliders'] = $this->sliderService->getByMasterId(6);
        session()->put('active','about');

        return view('frontend.iqac.iqac_home',$data);
    }
    public function iqacTeam()
    {
        $data['teams'] = Team::with('member')->get();
        session()->put('active','team');

        return view('frontend.iqac.iqac_team',$data);
    }

    public function iqacTrainingWorkshop()
    {
        $data['trainingWorkshopSeminars']=TrainingWorkShopSeminar::get();
        session()->put('active','training_workshop');

        return view('frontend.iqac.iqac_training_workshop',$data);
    }

    public function iqacDocument()
    {
        $data['documents']=Document::get();
        session()->put('active','document');

        return view('frontend.iqac.iqac_document',$data);
    }
    public function iqacContact()
    {
        session()->put('active','contact');

        return view('frontend.iqac.iqac_contact');
    }
    public function iqacNewsEvent()
    {
        session()->put('active','news_event');

        return view('frontend.iqac.iqac_news_event');
    }
    public function iqacFAQ()
    {
        $data['faqs']=Faq::where('faq_type',6)->where('status',1)->get();
        session()->put('active','faq');

        return view('frontend.iqac.iqac_faq',$data);
    }
}
