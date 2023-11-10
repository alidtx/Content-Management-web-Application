<?php
namespace App\Services;

use App\Models\OfficeOrder; 
use Illuminate\Http\Request;


/**
 * Class NocService
 * @package App\Services
 */
class NocService
{
        public static function NocList()
	{        
         
                $data = OfficeOrder::join('profiles', 'office_orders.member_id', 'profiles.id')
                ->leftJoin('departments', 'office_orders.category_id', 'departments.id')
                ->select('office_orders.*', 'profiles.nameEn as pname', 'departments.name as dname')
                ->orderBy('id', 'DESC')->get(); 
                return $data; 
	}

        public function saveEvent(Request $request)
        { 
                //dd($request);
                $params = $request->all();
                $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
                
                $params['status'] = $request->status ?? 0;
                //dd($params);
                $officeOrder = OfficeOrder::create($params);
                if ($request->hasfile('attachment')) {
                        $file = $request->file('attachment');
                        $name = time().rand(1,100).'.'.$file->extension(); 
                   
                        if ($file->move(public_path('upload/office_order'), $name)) {
                               
                                $officeOrder->attachment = $name; 
                                $officeOrder->update();
                        }
                }
        }
    
	public static function SingleData($id)
	{ 
			$data = OfficeOrder::find($id);  
			
			return $data; 
	}
        public function updateEvent(Request $request, $id)
        {
              //dd($request);
                $data = OfficeOrder::find($id);
                $prem = $request->except(['_token']);
                $prem['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
                $data['status'] = $request->status ?? 0;

                if ($request->hasfile('attachment')) {
                        $file = $request->file('attachment');
                        $name = time().rand(1,100).'.'.$file->extension(); 
                   
                        if ($file->move(public_path('upload/office_order'), $name)) {
                               
                                $data['attachment'] = $name;  
                        }
                }
                $data->update($prem);
                 
            return redirect()->route('noc.list')->with('success', 'edit Successfully');
        }
        public function statusChangeEvent(Request $request)
        {
            $data = OfficeOrder::find($request->id);  
            $data->status = $request->status;
                $data->update();
                return true;
    
        }

}
