<?php
namespace App\Services;

use App\Models\PersonnelsToOffice;
use Illuminate\Http\Request;
/**
 * Class DeanHonorBoardService
 * @package App\Services
 */
class PersonnelsToOfficeService
{
    
    public function statusChangeEvent(Request $request)
    {
        $data = PersonnelsToOffice::find($request->id); 
        //DD('HERE') ;
        $data->status = $request->status;
        $data->update();
        return true;
    }

}
