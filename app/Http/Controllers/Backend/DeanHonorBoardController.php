<?php

namespace App\Http\Controllers\Backend;

use App\Models\DeanHonorBoard;
use App\Services\DeanHonorBoardService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeanHonorBoardController extends Controller
{

    public function index()
    {

         $allData = DeanHonorBoardService::List();
        return view('backend.dean_honor_board.index', compact('allData'));
    }

    public function add()
    {
        $data = [];
        return view('backend.dean_honor_board.add',$data);
    }
    public function store(Request $request, DeanHonorBoardService $DeanHonorBoard)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => 'nullable|mimes:jpeg, jpg, gif, png, svg'
        ]);
        $DeanHonorBoard->saveEvent($request);
        return redirect()->route('dean-office.honor_board.list')->with('success', 'add Successfully');
    }
    public function edit($id)
    {
        $data['editData'] = DeanHonorBoardService::SingleData($id);
    	return view('backend.dean_honor_board.add')->with($data);
    }

    public function update(Request $request, $id, DeanHonorBoardService $DeanHonorBoard)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'iamge' => 'nullable|mimes:jpeg, jpg, gif, png, svg'
        ]);
         //dd($request->all());
        $DeanHonorBoard->updateEvent($request, $id);

        return redirect()->route('dean-office.honor_board.list')->with('info','Update Successfully');
    }
    public function status_change(Request $request, DeanHonorBoardService $DeanHonorBoard)
    {

        $DeanHonorBoard->statusChangeEvent($request);
        return redirect()->route('dean-office.honor_board.list')->with('success', 'Status Update Successfully');
    }
}
