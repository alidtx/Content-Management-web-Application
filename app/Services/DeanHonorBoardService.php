<?php
namespace App\Services;

use App\Models\DeanHonorBoard;
use App\Models\DeanInformation;
use Illuminate\Http\Request;
/**
 * Class DeanHonorBoardService
 * @package App\Services
 */
class DeanHonorBoardService
{
    	
    public static function List()
    {
        try{
                $data = DeanHonorBoard::leftJoin('faculties', 'dean_honor_boards.faculty_id', 'faculties.id')
                ->leftJoin('departments', 'dean_honor_boards.department_id', 'departments.id') 
                ->select('dean_honor_boards.*','departments.name as dname', 'faculties.name  as fname')
                ->get(); 
                
                return $data;
        }
        catch(\Exception $e){
                $d['error'] = 'Something wrong';
                return response()->json(["msg"=>$e->getMessage()]);
        }
    }
    // add
    public function saveEvent(Request $request)
    {             
    
        $data = DeanHonorBoard::Create($request->all());
        
        if ($request->hasfile('image')) {
                $file = $request->file('image');
                $img_name = time().rand(1,100).'.'.$file->extension(); 
        
                if ($file->move(public_path('upload/dean_honor_board'), $img_name)) {
                        
                        $data->image = $img_name; 
                        $data->update();
                }
        }
        
        $data->save();
        return true;
    
    }    

    public static function SingleData($id)
    { 
        $data = DeanHonorBoard::find($id);  
        
        return $data; 
    }
    
    public function updateEvent(Request $request, $id)
    {
        $data = DeanHonorBoard::find($id);         
        
        $data->update($request->all()); 
        if ($request->hasfile('image')) {
                $file = $request->file('image');
                $img_name = time().rand(1,100).'.'.$file->extension(); 
                
                if ($file->move(public_path('upload/dean_honor_board'), $img_name)) {
                        $data->image = $img_name; 
                }
        }

        try{
                $data->update();
                return true;

        }catch(Exception $e){
                return $e;
        }
    }
    
    public function statusChangeEvent(Request $request)
    {
        $data = DeanHonorBoard::find($request->id); 
        //DD('HERE') ;
        $data->status = $request->status;
        $data->update();
        return true;
    }

}
