<?php

namespace App\Http\Controllers\Backend\BangabandhuChair;

use App\Http\Controllers\Controller;
use App\Services\BangabandhuChair\BBChairQuoteService;
use Illuminate\Http\Request;

class BangabandhuChairQuoteController extends Controller
{
    private $bbChairQuoteService;

    public function __construct(BBChairQuoteService $bbChairQuoteService)
    {
        $this->bbChairQuoteService = $bbChairQuoteService;
    }

    public function index()
    {
         $data['quotes'] = $this->bbChairQuoteService->getAll();

        return view('backend.bb_chair.bb_chair_quote.index', $data);
    }
    public function create()
    {
        return view('backend.bb_chair.bb_chair_quote.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title1' => 'required',
        ]);
        $this->bbChairQuoteService->create($request);

        return redirect()->route('bangabandhu_chair.quote')->with('success','Data stored successfully');
    }

    public function edit($id){

        $data['editData']=$this->bbChairQuoteService->getByID($id);

        return view('backend.bb_chair.bb_chair_quote.add', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title1' => 'required',
        ]);
        $this->bbChairQuoteService->update($request,$id);

        return redirect()->route('bangabandhu_chair.quote')->with('success','Data Update successfully');

    }
    public function delete(Request $request){
        // dd($request->id);
        $this->bbChairQuoteService->delete($request->id);
        return redirect()->back();
    }
}
