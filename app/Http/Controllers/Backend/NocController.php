<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfficeOrder; 
use App\Services\NocService; 
use App\Models\PersonnelsToFaculty;
use App\Models\PersonnelsToOffice;
use App\Models\Profile;
use App\Models\Office;
use App\Models\Department;

class NocController extends Controller
{
    //
    public function index()
    { 

        $allData = NocService::NocList(); 
        return view('backend.noc.index', compact('allData'));
    }
    public function add_noc()
    {  
        $data = [];
        return view('backend.noc.add',$data);
    }
    
    public function categoryWiseDeptOrOffice(Request $request)
    {
        if($request->category_type_value==1){
            $data['categories'] = Department::get();
        }
        elseif($request->category_type_value==2){
            $data['categories'] = Office::get();
        }
        // dd( $data['categories']);
        if(isset($data['categories']))
		{
			return response()->json($data['categories']);
		}
		else
		{
			return response()->json('fail');
		}
    }
    public function departmentWiseMember(Request $request)
    { 
         //dd($request->category_id);
        if ($request->category_type == 1) {
           
            $data['member'] = PersonnelsToFaculty::join('profiles', 'personnels_to_faculties.faculty_id', 'profiles.faculty_id')
            ->select('profiles.id','profiles.nameEn as name')
            ->where('profiles.department_id', $request->category_id)
            ->orderBy('personnels_to_faculties.id', 'DESC')
            ->get(); 
              

        } elseif ($request->category_type == 2) {
            $data['member'] = PersonnelsToOffice::join('profiles', 'personnels_to_offices.office_id', 'profiles.office_id') 
            ->select('profiles.id','profiles.nameEn as name')
            ->where('profiles.office_id', $request->category_id)
            ->orderBy('personnels_to_offices.id', 'DESC')
            ->get();  
  
        }
  
        if(isset($data['member']))
		{
			return response()->json($data['member']);
		}
		else
		{
			return response()->json('fail');
		} 
       
    }

    public function MemberWiseDesignation(Request $request)
    {
 
        //dd($request->member_id);
        $member = Profile::where('id',$request->member_id)->first();

        if(isset($member))
		{
			return response()->json($member->designation);
		}
		else
		{
			return response()->json('fail');
		}
    }

    public function store(Request $request, NocService $OfficeOrder)
    {
        $request->validate([
    		'title' => 'required',
    		'publish_date' => 'required',
            'attachment' => 'max:200000'
        ]);  
 
        $OfficeOrder->saveEvent($request);        

    	return redirect()->route('noc.list')->with('success','NOC/ Office Order added Successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = NocService::SingleData($id);
    	return view('backend.noc.add')->with($data);
    }

    public function update(Request $request, $id, NocService $OfficeOrder)
    {
        $request->validate([
    		'title' => 'required',
    		'publish_date' => 'required',
        ]);
         //dd($request->all());
        $OfficeOrder->updateEvent($request, $id);
         
        return redirect()->route('noc.list')->with('info','NOC/ Office Order Update Successfully');
    }
    public function status_change(Request $request, NocService $OfficeOrder)
    { 
        
        $OfficeOrder->statusChangeEvent($request);
        return redirect()->route('noc.list')->with('success', 'Status Update Successfully');
    }

}
