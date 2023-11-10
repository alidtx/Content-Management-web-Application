<?php

namespace App\Services\BangabandhuChair;

use App\Helpers\ImageHelper;
use App\Models\BangabandhuChairAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class BBChairAboutService implements IService
{
    
    public function getAll()
	{
		try{
			$data = BangabandhuChairAbout::first();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function create(Request $request)
    {
        $info = new BangabandhuChairAbout();
        $info->message     = $request->message;
        $info->slider_id     = $request->slider_id;
        
        // if($request->file('image')){
        //     $config = array(
        //         'name'      => "image",
        //         'path'      => 'upload/bangabandhu_chair',
        //         'width'     => 300,
        //         'height'    => 300
        //     );
        //     $images = ImageHelper::uploadImage($config);
        //     $info->image = $images['filename'];
        // }
        $info->save();
    }

	public function getByID($id)
	{ 
	}
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $info = BangabandhuChairAbout::find($id);
        //     if($request->file('image')){
        //     $config = array(
        //         'name'      => "image",
        //         'path'      => 'upload/bangabandhu_chair',
        //         'width'     => 300,
        //         'height'    => 300
        //     );
        //     $images = ImageHelper::uploadImage($config);
        //     $data['image'] = $images['filename'];
        // }

        $info->update($data);
        
    }

    public function delete($id)
    {
        
    }

}
