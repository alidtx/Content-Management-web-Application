<?php

namespace App\Services\BangabandhuChair;

use App\Models\CompletedResearch;
use App\Models\OngoingResearch;
use App\Models\PersonnelToBbResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class BBChairResearcherService implements IService
{
    
    public function getAll()
	{
		try{
			$data = PersonnelToBbResearch::get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    
    public function create(Request $request)
    {
        $data = new PersonnelToBbResearch();
        $data->profile_id     = $request->profile_id;
        $data->status     = $request->status;

        $data->save();
    }

	public function getByID($id)
	{
        $data = PersonnelToBbResearch::findOrFail($id);
        
        return $data;
	}
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $params = PersonnelToBbResearch::findOrFail($id);
        $params->update($data);
        
    }

    public function delete($id)
    {
        $deleteData = PersonnelToBbResearch::findOrFail($id);
        $deleteData->delete();
        
        return true;
    }

    public function getOngoingResearch()
	{
		try{
			$data = OngoingResearch::where('research_for', 1)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function getCompletedResearch()
	{
		try{
			$data = CompletedResearch::where('research_for', 1)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
}
