<?php
namespace App\Services;

use App\Models\DeanInformation;
use Illuminate\Http\Request;
/**
 * Class DeanInformationService
 * @package App\Services
 */
class DeanInformationService
{
	
        public static function List()
        {
                try{
                        $data = DeanInformation::leftJoin('faculties', 'dean_informations.faculty_id', 'faculties.id')
                        ->leftJoin('departments', 'dean_informations.department_id', 'departments.id') 
                        ->select('dean_informations.*','departments.name as dname', 'faculties.name  as fname')
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
        
                $data = DeanInformation::Create($request->all());
                
                
                if ($request->hasfile('image')) {
                        $file = $request->file('image');
                        $img_name = time().rand(1,100).'.'.$file->extension(); 
                
                        if ($file->move(public_path('upload/dean_information'), $img_name)) {
                                
                                $data->image = $img_name; 
                                $data->update();
                        }
                }

                if ($request->hasfile('banner')) {
                        $file = $request->file('banner');
                        $bname = time().rand(1,100).'.'.$file->extension(); 
                
                        if ($file->move(public_path('upload/dean_information'), $bname)) {
                        
                                $data->banner = $bname; 
                                $data->update();
                        }
                } 


                $data->save();
                return true;
        
        }    

        public static function SingleData($id)
        { 
                        $data = DeanInformation::find($id);  
                        
                        return $data; 
        }
        
        public function updateEvent(Request $request, $id)
        {
                $data = DeanInformation::find($id);         
                
                $data->update($request->all()); 
                $data->description = $request->description;
                if ($request->hasfile('image')) {
                $file = $request->file('image');
                $img_name = time().rand(1,100).'.'.$file->extension(); 
                
                if ($file->move(public_path('upload/dean_information'), $img_name)) {
                        $data->image = $img_name; 
                        
                        
                }
                }
                if ($request->hasfile('banner')) {
                        $file = $request->file('banner');
                        $name = time().rand(1,100).'.'.$file->extension(); 
                
                        if ($file->move(public_path('upload/dean_information'), $name)) {
                        
                                $data->banner = $name; 
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
                $data = DeanInformation::find($request->id); 
                //DD('HERE') ;
                $data->status = $request->status;
                $data->update();
                return true;

        }
}
