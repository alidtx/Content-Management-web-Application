<?php

namespace App\Services\Message;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;
use Exception;

/**
 * Class PageService
 * @package App\Services
 */
class MessageService implements IService
{
    public function getAll()
	{
		try{
			$data = Message::all();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function create(Request $request)
    {
        $data                   = new Message();
        $data->type_id          = $request->type_id;
        $data->category_id      = $request->category_id;
        $data->profile_id        = $request->profile_id;
        $data->title_first_part = $request->title_first_part;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->status           = $request->status;
        $data->save();
    }


	public function getByID($id)
	{
        $data = Message::find($id);

        return $data;
	}

	public function getMessageFromHead($type_id, $category_id)
	{
        $data = Message::with('profile')->where('type_id',$type_id)->where('category_id', $category_id)->first();

        return $data;
	}
    public function update(Request $request, $id)
    {
    	$data = Message::find($id);

        $data->type_id          = $request->type_id;
        $data->category_id      = $request->category_id;
        $data->profile_id        = $request->profile_id;
        $data->title_first_part = $request->title_first_part;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->status           = $request->status;

        try{
            $data->save();
            return true;

        }catch(Exception $e){
            return $e;
        }
    }

    public function delete($id)
    {
        $data = Message::find($id);
    	$data->delete();

        return true;
    }

}
