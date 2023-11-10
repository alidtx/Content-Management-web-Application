<?php

namespace App\Services;

use App\Models\SpecialAchievement;
use Illuminate\Http\Request;
use App\Services\IService;
use Image;

/**
 * Class SpecialAchievementService
 * @package App\Services
 */
class SpecialAchievementService implements IService
{

    public function getAll()
	{
		try{
			$data = SpecialAchievement::all();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
    }

    public function getArchivement($id)
	{
		try{
			$data = SpecialAchievement::where(['category'=>1,'id'=>$id])->first();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
    }

    public function create(Request $request)
    {
        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));
       // dd($params);
        if ($file = $request->file('image'))
        {
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/special_achievement'), $filename);
            $image=Image::make(public_path('upload/special_achievement/').$filename);
            $image->fit(340,207)->save(public_path('upload/special_achievement/').$filename);
            $params['image']= $filename;
        }
        SpecialAchievement::create($params);
    }
	public function getByID($id)
	{
        $data = SpecialAchievement::find($id);

        return $data;
	}
    public function update(Request $request, $id)
    {
        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));
        $data = SpecialAchievement::find($id);

        if ($file = $request->file('image'))
        {   if(file_exists(public_path('upload/special_achievement/'.$data->image)))
            {
                @unlink(public_path('upload/special_achievement/'.$data->image));
            }
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/special_achievement'), $filename);
            $image=Image::make(public_path('upload/special_achievement/').$filename);
            $image->fit(340,207)->save(public_path('upload/special_achievement/').$filename);
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
        $deleteData = SpecialAchievement::find($id);
            // @unlink(public_path('upload/faculty/'.$deleteData->image));
        $deleteData->delete();

        return true;
    }

    public function filterStudent()
    {
    	$data = SpecialAchievement::where('category',1)->get();
    	return $data;
    }

    public function filterTeacher()
    {
    	$data = SpecialAchievement::where('category',2)->get();
    	return $data;
    }

    public function filterOrganization()
    {
    	$data = SpecialAchievement::where('category',3)->get();
    	return $data;
    }

}
