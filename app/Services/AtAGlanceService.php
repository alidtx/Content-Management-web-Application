<?php

namespace App\Services;

use App\Models\AtAGlanceNumber;
use Illuminate\Http\Request;
use App\Services\IService;

/**
 * Class AtAGlanceService
 * @package App\Services
 */
class AtAGlanceService implements IService
{

    public function getAll()
	{
		// try{
		// 	$data = VideoGallery::orderBy('publish_date','desc')->get();
		// 	return $data;
		// }
		// catch(\Exception $e){
		// 	$d['error'] = 'Something wrong';
		// 	return response()->json(["msg"=>$e->getMessage()]);
        // }
    }
    public function getFirst()
    {
        $data = AtAGlanceNumber::first();
        return $data;
    }
    public function create(Request $request)
    {
        $data = $request->all();
        AtAGlanceNumber::create($data);
    }
	public function getByID($id)
	{
        // $data = VideoGallery::find($id);

        // return $data;
	}
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $at_a_glance = AtAGlanceNumber::first();
        $at_a_glance->update($data);

        try{
            $at_a_glance->update($data);
            return true;

        }catch(Exception $e){
            return $e;
        }
    }

    public function delete($id)
    {
        // $deleteData = VideoGallery::find($id);
        // $deleteData->delete();

        // return true;
    }

}
