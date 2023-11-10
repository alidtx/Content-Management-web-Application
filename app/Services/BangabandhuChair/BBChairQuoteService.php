<?php

namespace App\Services\BangabandhuChair;

use App\Helpers\ImageHelper;
use App\Models\BangabandhuChairQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class BBChairQuoteService implements IService
{

    public function getAll()
	{
		try{
			$data = BangabandhuChairQuote::get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function create(Request $request)
    {
        $data = new BangabandhuChairQuote();
        $data->title1     = $request->title1;
        $data->title2     = $request->title2;
        $data->description     = $request->description;

        $data->save();
    }

	public function getByID($id)
	{
        $data = BangabandhuChairQuote::findOrFail($id);

        return $data;
	}
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $params = BangabandhuChairQuote::findOrFail($id);
        $params->update($data);

    }

    public function delete($id)
    {
        // dd($id);
        $deleteData = BangabandhuChairQuote::findOrFail($id);
        $deleteData->delete();

        return true;
    }

}
