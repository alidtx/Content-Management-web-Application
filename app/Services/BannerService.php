<?php

namespace App\Services;

use App\Models\AppConfig;
use App\Models\Banner;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class SliderService
 * @package App\Services
 */
class BannerService implements IService
{

    public function getAll()
    {
        $data = Banner::orderBy('id','desc')->get();
        return $data;
    }

    public function getByID($id)
    {
        $data = Banner::find($id);
        return $data;
    }
    
    public function create(Request $request)
    {            
        $params = $request->all();
        $params['status'] = $request->status ?? 0;
        
        if ($file = $request->file('image')){
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/banner'), $filename);
            $params['image']= $filename;
        }
        // dd($params);
    	Banner::create($params);
    }

    // 
    public function update( Request $request,$id)
    {
        $data = Banner::find($id);
        $params = $request->all();
        $params['status'] = $request->status ?? 0;
    	if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/banner/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/banner'), $filename);
            $params['image']= $filename;

        }
    	$data->update($params);
 
        try{
            $data->update($params);
            return true;

        }catch(Exception $e){
            return $e;
        }
    }

    public function delete($id)
    {
        $data = Banner::find($id);  
        @unlink(public_path('upload/slider/'.$data->image));
        $data->delete();
        return true;
    }

    public function bannerTypeList($name)
    {
        $val = AppConfig::where('item', $name)->first();
        $data = json_decode($val->value);
        return $data;
    }
    public function bannerByRefId($ref_id)
    {
        $data = Banner::where('ref_id', $ref_id)->first();
        return $data;
    }

}
