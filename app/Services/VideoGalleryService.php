<?php

namespace App\Services;

use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Services\IService;

/**
 * Class VideoGalleryService
 * @package App\Services
 */
class VideoGalleryService implements IService
{
    
    public function getAll()
	{
		try{
			$data = VideoGallery::orderBy('publish_date','desc')->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function create(Request $request)
    {            
        //dd($request->date);
        $params = $request->all();
        $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
        $params['is_featured'] = $request->is_featured ?? 0;
        //dd($params);
        VideoGallery::create($params);
    }  
	public function getByID($id)
	{ 
        $data = VideoGallery::find($id);
        
        return $data; 
	}
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $params['publish_date'] = date('Y-m-d',strtotime($request->publish_date));
        $params['is_featured'] = $request->is_featured ?? 0;
        $data = VideoGallery::find($id);
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
        $deleteData = VideoGallery::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();
        
        return true;
    }

}
