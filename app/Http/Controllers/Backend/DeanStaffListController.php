<?php

namespace App\Http\Controllers\Backend;

use App\Services\DeanStaffListService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeanInformation;

class DeanStaffListController extends Controller
{

    public function index($id)
    {
        $data['dean_information_id'] = $id;
        $data['dean_info'] = DeanInformation::where('id',$id)->first();
        $data['allData'] = DeanStaffListService::List($id);
        return view('backend.dean_office.dean_staff_list.index')->with($data);
    }

    public function add($id)
    {
        $data = [];
        $data['dean_information_id'] = $id;
        return view('backend.dean_office.dean_staff_list.add',$data);
    }
    public function store(Request $request, DeanStaffListService $DeanInformation)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image' => 'nullable|mimes:jpeg, jpg, gif, png, svg'
        ]);
        $DeanInformation->saveEvent($request);
        return redirect()->route('dean-office.information')->with('success', 'add Successfully');
    }
    public function edit($id,$dean_information_id)
    {
        $data['dean_information_id'] = $dean_information_id;
        $data['editData'] = DeanStaffListService::SingleData($id);
    	return view('backend.dean_office.dean_staff_list.add')->with($data);
    }

    public function update(Request $request, $id, DeanStaffListService $DeanInformation)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'iamge' => 'nullable|mimes:jpeg, jpg, gif, png, svg'
        ]);
         //dd($request->all());
        $DeanInformation->updateEvent($request, $id);

        return redirect()->route('dean-office.information')->with('info','Update Successfully');
    }
    public function status_change(Request $request, DeanStaffListService $DeanInformation)
    {

        $DeanInformation->statusChangeEvent($request);
        return redirect()->route('dean-office.information')->with('success', 'Status Update Successfully');
    }
}
