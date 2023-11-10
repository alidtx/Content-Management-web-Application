<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\VcHonorBoardMember;
use App\Models\VcInformation;
use Illuminate\Http\Request;

class VcHonorBoardController extends Controller
{
    public function list()
    {
        $vc_honor_board_list = VcHonorBoardMember::latest()->get();
        return view('backend.vc_honor_board.list',compact('vc_honor_board_list'));
    }

    public function create()
    {
       return view('backend.vc_honor_board.add');
    }

    public function store(Request $request)
    {
    //    return $request->all();
       $request->validate([
        'name' => 'required',
        'designation' => 'required',
        'image' => 'required|mimes:png,jpg',
       ]);

       if($request->has('image')) {
          $config = array(
            'name' => 'image',
            'path' => 'upload/vc_honor_board',
            'height' => 300,
            'width' => 300,
          );
          $data = ImageHelper::uploadImage($config);
       }

       $honor_board = new VcHonorBoardMember();
       $honor_board->name = $request->name;
       $honor_board->designation = $request->designation;
       $honor_board->start_date = $request->start_date;
       $honor_board->end_date = $request->end_date;
       $honor_board->image = $data['filename'];
       $honor_board->save();

       return redirect()->route('vc.honor.board.list')->with('success','Data updated Success');
    }

    public function edit($id)
    {
        $editData = VcHonorBoardMember::find($id);
        return view('backend.vc_honor_board.add',compact('editData'));
    }

    public function update(Request $request, $id)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'mimes:png,jpg',
           ]);

           $editData = VcHonorBoardMember::find($id);
           if($request->has('image')) {
               $config = array(
                   'name' => 'image',
                   'path' => 'upload/vc_honor_board',
                   'height' => 300,
                   'width' => 300,
                );
              @unlink(public_path('upload/vc_honor_board/'.$editData->image));
              $data = ImageHelper::uploadImage($config);
              $editData->image = $data['filename'];
           }

           $editData->name = $request->name;
           $editData->designation = $request->designation;
           $editData->start_date = $request->start_date;
           $editData->end_date = $request->end_date;
           $editData->save();

           return redirect()->route('vc.honor.board.list')->with('success','Data updated Success');
    }
}
