<?php

namespace App\Http\Controllers\Frontend;

use App\Services\NewsEventNoticeServices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsEventNoticeController extends Controller
{

    private $NewsEventNoticeServices;
    public function __construct(NewsEventNoticeServices $NewsEventNoticeServices)
    {
        $this->NewsEventNoticeServices = $NewsEventNoticeServices;
    }

    public function allnews()
    {
       $data['type'] = 'News';
       $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(1,15); //post type and last array 
       return view('frontend.news.allnews', $data);
    }
    public function allevents()
    {
       $data['type'] = 'Events';
       $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(2,15); //post type and last array 
       return view('frontend.news.allnews', $data);
    }
    public function allnotice()
    {
       $data['type'] = 'Notice';
       $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(3,15); //post type and last array 
       return view('frontend.news.allnews', $data);
    }
    public function news($id)
    {
       $data['news'] = $this->NewsEventNoticeServices->getSelectedRange(1,15); //post type and last array
       $data['info'] = $this->NewsEventNoticeServices->getByID($id);
       return view('frontend.news.news_details', $data);
    }
    public function events($id)
    {

       $data['events'] =$this->NewsEventNoticeServices->getSelectedRange(2,15); //post type and last array
       $data['info'] = $this->NewsEventNoticeServices->getByID($id);
       return view('frontend.news.events_details', $data);
    }
    public function notice($id)
    {
       $data['notice'] = $this->NewsEventNoticeServices->getSelectedRange(3,15); //post type and last array
       $data['info'] = $this->NewsEventNoticeServices->getByID($id);
       return view('frontend.news.notice_details', $data);
    }
}
