<?php
namespace App\Services;

use App\Models\DeanStaffList;
use Illuminate\Http\Request;
/**
 * Class DeanStaffListService
 * @package App\Services
 */
class DeanStaffListService
{
	
        public static function List($id)
        {
                try{
                        $data = DeanStaffList::leftJoin('dean_informations', 'dean_staff_lists.dean_information_id', 'dean_informations.id')
                        ->select('dean_staff_lists.*','dean_informations.name as dean_name')
                        ->where('dean_information_id',$id)
                        ->get(); 

                //dd($data['list']);
                        
                        return $data;
                }
                catch(\Exception $e){
                        $d['error'] = 'Something wrong';
                        return response()->json(["msg"=>$e->getMessage()]);
                }
        }
        // add
        public function saveEvent(Request $request)
        {             
        
                $data = DeanStaffList::Create($request->all());
                
                
                if ($request->hasfile('image')) {
                        $file = $request->file('image');
                        $img_name = time().rand(1,100).'.'.$file->extension(); 
                
                        if ($file->move(public_path('upload/dean_staff_list'), $img_name)) {
                                
                                $data->image = $img_name; 
                                $data->update();
                        }
                }

                $data->save();
                return true;
        
        }    

        public static function SingleData($id)
        { 
                $data = DeanStaffList::find($id);  
                
                return $data; 
        }
        
        public function updateEvent(Request $request, $id)
        {
                $data = DeanStaffList::find($id);         
                
                $data->update($request->all()); 
                        if ($request->hasfile('image')) {
                        $file = $request->file('image');
                        $img_name = time().rand(1,100).'.'.$file->extension(); 
                        
                        if ($file->move(public_path('upload/dean_staff_list'), $img_name)) {
                                $data->image = $img_name; 
                        }
                }

                try{
                        $data->update();
                        return true;

                }catch(Exception $e){
                        return $e;
                }
        }
        
        public function statusChangeEvent(Request $request)
        {
                $data = DeanStaffList::find($request->id); 
                //DD('HERE') ;
                $data->status = $request->status;
                $data->update();
                return true;

        }
}
