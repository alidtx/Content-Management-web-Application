<?php

namespace App\Services;

use App\Models\Magazine;
use Illuminate\Http\Request;
/**
 * Class MagazineService
 * @package App\Services
 */
class MagazineService
{
    public static function List()
	{
		try{
			$data = Magazine::all(); 

            //dd($data['list']);
			
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function saveEvent(Request $request)
    {            
          //dd($request);
            $params = $request->all();
            $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
            $magazine = Magazine::create($params);

            if ($request->hasfile('image')) {
                    $file = $request->file('image');
                    $img_name = time().rand(1,100).'.'.$file->extension(); 
               
                    if ($file->move(public_path('upload/magazine'), $img_name)) {
                           
                            $magazine->image = $img_name; 
                            $magazine->update();
                    }
            }

            if ($request->hasfile('attachment')) {
                    $file = $request->file('attachment');
                    $name = time().rand(1,100).'.'.$file->extension(); 
               
                    if ($file->move(public_path('upload/magazine'), $name)) {
                           
                            $magazine->attachment = $name; 
                            $magazine->update();
                    }
            } 
    }  
	public static function SingleData($id)
	{ 
			$data = Magazine::find($id);  
			
			return $data; 
	}
    // 
    public function updateEvent(Request $request, $id)
    {
        $data = Magazine::find($id);        
        $data->name = $request->name;
        $data->publish_Date = date('Y-m-d',strtotime($request->publish_date));
        
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $img_name = time().rand(1,100).'.'.$file->extension(); 
        
            if ($file->move(public_path('upload/magazine'), $img_name)) {
                    $data->image = $img_name; 
                  //dd($newsletter->image); 
                     
            }
        }

        if ($request->hasfile('attachment')) {
                $file = $request->file('attachment');
                $name = time().rand(1,100).'.'.$file->extension(); 
        
                if ($file->move(public_path('upload/magazine'), $name)) {
                    
                        $data->attachment = $name; 
                }
        }

        try{
            $data->update();
            return true;

        }catch(Exception $e){
            return $e;
        }
    }
    // 
    public function statusChangeEvent(Request $request)
    {
        $data = Magazine::find($request->id);  
        $data->status = $request->status;
            $data->update();
            return true;

    } 
}
