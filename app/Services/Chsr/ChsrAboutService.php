<?php

namespace App\Services\Chsr;

use App\Models\ChsrSupervisorList;
use App\Models\Page;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class ChsrAboutService implements IService
{
    
    public function getAll()
	{
		try{
            $data = Page::where('type', 5)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    
    public function create(Request $request)
    {           
        
    }  
	public function getByID($id)
	{ 
        $data = Page::where('type', 5)->where('id', $id)->first();
        
        return $data; 
	}
    public function update(Request $request, $id)
    {
        $data = Page::where('type', 5)->where('id', $id)->first();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/chsr/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/chsr'), $filename);
            $data->image= $filename;
        }
        $data->update(); 
    }

    public function delete($id)
    {
        $deleteData = ChsrSupervisorList::findOrFail($id);
        $deleteData->delete();

        return true;
    }

    public function getAbout()
	{
		try{
			$data = Page::where('type', 5)->first();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}

}
