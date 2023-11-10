<?php

namespace App\Services;

use App\Models\Newsletter;
use Illuminate\Http\Request;

/**
 * Class NewsletterService
 * @package App\Services
 */
class NewsletterService
{
    public static function List()
	{
		try{
			$data = Newsletter::all(); 
 
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
            $newsletter = Newsletter::create($params);

            if ($request->hasfile('image')) {
                    $file = $request->file('image');
                    $img_name = time().rand(1,100).'.'.$file->extension(); 
               
                    if ($file->move(public_path('upload/newsletter'), $img_name)) {
                           
                            $newsletter->image = $img_name; 
                            $newsletter->update();
                    }
            }

            if ($request->hasfile('attachment')) {
                    $file = $request->file('attachment');
                    $name = time().rand(1,100).'.'.$file->extension(); 
               
                    if ($file->move(public_path('upload/newsletter'), $name)) {
                           
                            $newsletter->attachment = $name; 
                            $newsletter->update();
                    }
            } 
    }  
	public static function SingleData($id)
	{ 
			$data = Newsletter::find($id);  
			
			return $data; 
	}
    // 
    public function updateEvent(Request $request, $id)
    {
        $data = Newsletter::find($id);        
        $data->issue_no = $request->issue_no;   
        $data->name = $request->name;
        $data->publish_Date = date('Y-m-d',strtotime($request->publish_date));
       
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $img_name = time().rand(1,100).'.'.$file->extension(); 
        
            if ($file->move(public_path('upload/newsletter'), $img_name)) {
                    $data->image = $img_name; 
                  //dd($newsletter->image); 
                     
            }
        }

        if ($request->hasfile('attachment')) {
                $file = $request->file('attachment');
                $name = time().rand(1,100).'.'.$file->extension(); 
        
                if ($file->move(public_path('upload/newsletter'), $name)) {
                    
                        $data->attachment = $name; 
                }
        }
        
        $data->update();
 
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
        $data = Newsletter::find($request->id);  
        $data->status = $request->status;
            $data->update();
            return true;

    } 

}
