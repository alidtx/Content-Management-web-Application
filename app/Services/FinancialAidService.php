<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use App\Models\FinancialAid;

use Illuminate\Http\Request;
/**
 * Class FinancialAidService
 * @package App\Services
 */
class FinancialAidService
{
	public static function SingleData($id)
	{
			$data = FinancialAid::find($id);

			return $data;
	}
    public function updateEvent(Request $request, $id)
    {
        // dd($request->all());
        $data = FinancialAid::find($id);
        $data->how_aid_works = $request->how_aid_works;
        $data->type_of_aids = $request->type_of_aids;
        $data->policies_and_procedures = $request->policies_and_procedures;
        $data->aid_file = $request->aid_file;

        if ($request->hasfile('aid_file')) {
            //dd($request->file('aid_file'));
            $file = $request->file('aid_file');
            $name = time().rand(1,100).'.'.$file->extension();
            if ($file->move(public_path('upload/financial_aids'), $name)) {
                $data->aid_file = $name;
            }
         }
        // dd($data);
        $data->update();
        return true;

    }

}
