<?php

namespace App\Http\Controllers\Frontend\Faculty;
use App;
use App\Http\Controllers\Controller;
use App\Services\BannerService;
use DB;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Services\FacultyService;
use App\Services\DepartmentService;
use App\Services\Message\MessageService;
use App\Services\NewsEventNoticeServices;
use App\Services\PersonnelsToFacultyService;
use App\Services\Slider\SliderService;

class FacultyController extends Controller
{
    private $FacultyService;
    private $DepartmentService;
    private $NewsEventNoticeServices;
    private $PersonnelsToFacultyService;
    private $message;
    private $slider;
    private $bannerService;

    public function __construct(FacultyService $FacultyService,DepartmentService $DepartmentService,
     NewsEventNoticeServices $NewsEventNoticeServices, PersonnelsToFacultyService $PersonnelsToFacultyService, MessageService $message, SliderService $slider, BannerService $bannerService)
    {
        $this->FacultyService = $FacultyService;
        $this->DepartmentService = $DepartmentService;
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
        $this->PersonnelsToFacultyService = $PersonnelsToFacultyService;
        $this->message = $message;
        $this->slider = $slider;
        $this->bannerService = $bannerService;
    }

     public function facultyHome($id)
     {
         $type_id = 1;
        //  $faculty_id = $id; // faculty_id
        //  $data['id']=$id;
         $data['faculty'] = $this->FacultyService->getByID($id);
         $data['program_cat']=$this->FacultyService->programCategory();
         $data['departments']=$this->DepartmentService->DepartmentList(['faculty_id'=>$id]);
         $data['faculty_head']=$this->FacultyService->facultyHead(['faculty_id'=>$id]);
         $data['faculty_tamplate']=$this->FacultyService->facultyTamplate(['faculty_id'=>$id]);
         $data['faculty_name']=$this->FacultyService->facultyName(['faculty_id'=>$id]);
         $data['faculty_head_message']=$this->message->getMessageFromHead($type_id, $data['faculty']->id);
         $data['sliders'] = $this->slider->getByMasterId($data['faculty']->slider_id);
        //  $data['sliders']=$this->FacultyService->facultySlider(['faculty_id'=>$id]);
         $data['faculty_members']=$this->PersonnelsToFacultyService->faculty_members(['faculty_id'=>$id]);
         $data['news']=$this->NewsEventNoticeServices->getNewsEventsNotice(1,2,$data['faculty']->id);
         $data['events']=$this->NewsEventNoticeServices->getNewsEventsNotice(2,2,$data['faculty']->id);
         $data['notices']=$this->NewsEventNoticeServices->getNewsEventsNotice(3,5,$data['faculty']->id);
         $data['banner'] = $this->bannerService->bannerByRefId(1);

         if($data['faculty_tamplate'] == 1) {
            return view('frontend.faculty.tamplate_one.index', $data);
         }
         return view('frontend.faculty.tamplate_two.index', $data);

        //  return view('frontend.faculty.faculty-home', $data);
     }


}
