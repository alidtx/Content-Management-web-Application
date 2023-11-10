<?php

namespace App\Http\Controllers\Frontend;

use App\Services\ContentMgt\PageService; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    private $pageService;
    public function __construct(PageService $pageService)
    { 
        $this->pageService = $pageService;
    }

    public function pages($id)
    {
      // $data['page_info']=CustomPage::find($id);
      $data['page_info']= $this->pageService->getByID($id);

       return view('frontend.pages', $data);
    }
}
