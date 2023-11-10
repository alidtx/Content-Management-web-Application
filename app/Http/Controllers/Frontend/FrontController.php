<?php

namespace App\Http\Controllers\Frontend;

use App;
use App\Http\Controllers\Controller;
use App\Models\CustomPage;
use App\Models\About;
use App\Models\Department;
use App\Models\ProgramCategory;
use App\Models\VcHonorBoardMember;
use App\Models\VcInformation;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToOffice;
use App\Models\News;
use App\Models\OnCampusFacility;
use App\Models\AtAGlanceNumber;
use App\Models\Banner;
use App\Models\VideoGallery;
use App\Models\iqacAbout;
use App\Models\CompletedResearch;
use App\Models\FrontendMenu;
use App\Models\Page;
use App\Services\Affiliation\AffiliateInstituteService;
use App\Services\BannerService;
use App\Services\Message\MessageService;
use App\Services\NewsEventNoticeServices;
use App\Services\Slider\SliderService;
use App\Services\CompleteResearchService\CompleteResearchService;
use DB;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Services\SpecialAchievementService;

class FrontController extends Controller
{
    private $achievementService;
    private $NewsEventNoticeServices;
    private $slider;
    private $message;
    private $affiliation;
    private $bannerService;
    private $CompleteResearchService;

    public function __construct(SpecialAchievementService $achievementService, NewsEventNoticeServices $NewsEventNoticeServices, SliderService $slider, MessageService $message, AffiliateInstituteService $affiliation, BannerService $bannerService, CompleteResearchService $CompleteResearchService)
    {
        $this->achievementService = $achievementService;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->slider = $slider;
        $this->message = $message;
        $this->affiliation = $affiliation;
        $this->bannerService = $bannerService;
        $this->CompleteResearchService = $CompleteResearchService;
    }

    public function index()
    {
        $data['sliders'] = $this->slider->getByMasterId(1);
        $data['vcInfo'] = $this->message->getMessageFromHead(3,1);
        $data['aboutUni']=About::first();
        $data['program_cat']=ProgramCategory::with('program')->take(4)->get();
        $data['special_achievements']= $this->achievementService->getAll();
        $data['on_campus_facilities']= OnCampusFacility::all();
        $data['notices']= $this->NewsEventNoticeServices->getSelectedRange(3,5);//News::orderBy('id','desc')->where('type',3)->get();
        $data['news']= $this->NewsEventNoticeServices->getSelectedRange(1,3);
        $data['events']= $this->NewsEventNoticeServices->getSelectedRange(2,4);
        $data['at_a_glance']= AtAGlanceNumber::first();
        $data['profile_count']= Profile::count();
        $data['personnels_to_faculty_count']= PersonnelsToFaculty::count();
        $data['personnels_to_office_count']= PersonnelsToOffice::count();
        $data['admission_programs']= Program::where('is_admission',1)->get();
        $data['faculties']= Faculty::all();
        $data['scrollbarNews'] = News::where('display_on_scrollbar',1)->orderBy('id','desc')->get();
        $data['featuredVideo'] = VideoGallery::where('is_featured',1)->orderBy('publish_date','desc')->first();
        $data['completedResearches'] = CompletedResearch::with('profile')->orderBy('date', 'desc')->get();
        // $data['sliders'] = $this->sliderService->getByMasterId(1);
        // dd($data['program_cat']);
       $data['affiliations'] = $this->affiliation->getFirstSixAffiliateInstitute(6);
       $data['affiliations'] = $this->affiliation->getFeaturedAffiliation();
       $data['banner'] = $this->bannerService->bannerByRefId(14);
        return view('frontend.home', $data);
    }

    public function archivement($id)

    {
    $data['achievements']=$this->achievementService->getArchivement($id);
    return view('frontend.archivement', $data);
    }

   public function research($id)
   {
    $data['completed_research']=$this->CompleteResearchService->CompleteResearch($id);
    return view('frontend.research',$data);
   }

     public function businessFaculty()
     {
        return view('frontend.faculty.business-faculty');
     }

    public function officer()
    {
        ///////////////
        return view('frontend.officer');
    }
    public function vc()
    {
        ///////////////
        return view('frontend.vc');
    }
    public function vc2()
    {
        ///////////////
        return view('frontend.vc2');
    }
    public function business_studies()
    {
        ///////////////
        return view('frontend.business_studies');
    }
    public function campus_life()
    {
        $data['on_campus_facilities']= OnCampusFacility::all();
       $data['banner'] = $this->bannerService->bannerByRefId(15);
       return view('frontend.campus_life', $data);
    }

    public function about_overview()
    {

        $data['about']=About::first();
        $data['news']= $this->NewsEventNoticeServices->getSelectedRange(1,10)
        ->take(1);
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        // dd($data['banner']);
        return view('frontend.about.about_bup',$data);
    }

    public function vcInformation()
    {
        $data['vcInfo'] = $this->message->getMessageFromHead(3,1);
        $data['vcHBM'] = VcHonorBoardMember::get();
        $data['banner'] = $this->bannerService->bannerByRefId(1);
        return view('frontend.about.vc_information', $data);
    }

    public function MenuUrl($menu)
    {
        $menu_url_data = FrontendMenu::where('slug', $menu)->first();
        if ($menu_url_data != null) {
            if ($menu_url_data->url_link_type == '1') {
                return redirect()->route($menu_url_data['url_link']);
            }

            if ($menu_url_data->url_link_type == '2') {
                $data['find_post'] = Page::where('title', @str_replace('-', ' ', $menu_url_data->url_link))->first();
                return view('frontend.single_page.single-page', $data);
            }

            if ($menu_url_data->url_link_type == '3') {
                $url = strpos($menu_url_data->url_link, 'http') !== 0 ? "http://" . $menu_url_data->url_link : $menu_url_data->url_link;
                header("Location:" . $url);
                die();
            }

            if ($menu_url_data->url_link_type == '4') {
                $data['find_post'] = $menu_url_data;
                return view('frontend.single_page.single-page-attach', $data);
            }
            return redirect()->back()->with('error', 'Sorry page is not found');
        } else {
            return redirect()->back();
        }
    }





}
