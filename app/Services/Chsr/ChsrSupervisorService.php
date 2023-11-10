<?php

namespace App\Services\Chsr;

use App\Models\ChsrSupervisorList;
use App\Models\CompletedResearch;
use App\Models\OngoingResearch;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class ChsrSupervisorService implements IService
{
    
    public function getAll()
	{
		try{
			$data = ChsrSupervisorList::all();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function create(Request $request)
    {       
        $reseracher = new ChsrSupervisorList();
        $reseracher->profile_id = $request->profile_id;
        $reseracher->program_category_id = $request->program_category_id;
        $reseracher->program_id = $request->program_id;
        $reseracher->status = $request->status;
        $reseracher->save();     
        
    }  
	public function getByID($id)
	{ 
        $data = ChsrSupervisorList::find($id);
        
        return $data; 
	}
    public function update(Request $request, $id)
    {
        $reseracher = ChsrSupervisorList::findOrFail($id);
        $reseracher->profile_id = $request->profile_id;
        $reseracher->program_category_id = $request->program_category_id;
        $reseracher->program_id = $request->program_id;
        $reseracher->status = $request->status;
        $reseracher->update(); 
    }

    public function delete($id)
    {
        $deleteData = ChsrSupervisorList::findOrFail($id);
        $deleteData->delete();

        return true;
    }

    public function getOngoingResearch()
	{
		try{
			$data = OngoingResearch::where('research_for', 2)->get();
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
			$data = CompletedResearch::where('research_for', 2)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}

}
