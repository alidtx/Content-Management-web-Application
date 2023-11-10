<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Faq;
use App\Services\Chsr\ChsrAboutService;
use App\Services\OfficeService;
use App\Services\Slider\SliderService;

class AboutChsrController extends Controller
{
    private $chsrAboutService;
    private $sliderService;
    private $officeService;

    public function __construct(SliderService $sliderService, ChsrAboutService $chsrAboutService)
    {
        $this->chsrAboutService = $chsrAboutService;
        $this->sliderService = $sliderService;
    }

    public function aboutView()
    {
        $data['chsrs'] = $this->chsrAboutService->getAll();

        return view('backend.about-chsr.view', $data);
    }

    public function editChsr($id)
    {
        $data['editData'] = $this->chsrAboutService->getByID($id);
        return view('backend.about-chsr.edit', $data);
    }
    public function updateChsr($id, Request $request)
    {
        $this->chsrAboutService->update($request, $id);
        
        return redirect()->route('chsr.edit', $id)->with('success', 'Data Updated Suceess');
    }
    public function faq()
    {
        $faqs = Faq::where('faq_type', 6)->get();
        return view('backend.about-chsr.faq.list', compact('faqs'));
    }
    public function create()
    {
        return view('backend.about-chsr.faq.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = new Faq();
        $faq->faq_type = $request->faq_type;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return redirect()->route('chsr.faq');
    }
}
