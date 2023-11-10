<?php

namespace App\Http\Controllers\Backend\Chsr;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class ChsrFaqController extends Controller
{
    public function create($type)
    {

      return view('backend.faq.add',compact('type'));

    }

    public function faqList()
    {
        $faq_lists = Faq::where('faq_type', 4)->get();
        $type = 'chsr';
        return view('backend.faq.view',compact('faq_lists'));
    }
}
