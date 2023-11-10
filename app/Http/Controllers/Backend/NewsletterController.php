<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Newsletter;
use App\Services\NewsletterService;

class NewsletterController extends Controller
{
    public function index()
    {
        $allData = NewsletterService::List();
        return view('backend.newsletter.index', compact('allData'));
    }

    public function add()
    {
        $data = [];
        return view('backend.newsletter.add',$data);
    }
    public function store(Request $request, NewsletterService $Newsletter)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'attachment' => 'nullable|mimes:pdf'
        ]);
        $Newsletter->saveEvent($request);
        return redirect()->route('news.newsletter.list')->with('success', 'add Successfully');
    }
    public function edit($id)
    {
        $data['editData'] = NewsletterService::SingleData($id);
    	return view('backend.newsletter.add')->with($data);
    }

    public function update(Request $request, $id, NewsletterService $Newsletter)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'attachment' => 'nullable|mimes:pdf'
        ]);
         //dd($request->all());
        $Newsletter->updateEvent($request, $id);

        return redirect()->route('news.newsletter.list')->with('info','Update Successfully');
    }
    public function status_change(Request $request, NewsletterService $Newsletter)
    {

        $Newsletter->statusChangeEvent($request);
        return redirect()->route('news.newsletter.list')->with('success', 'Status Update Successfully');
    }
}
