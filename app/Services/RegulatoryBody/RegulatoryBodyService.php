<?php

namespace App\Services\RegulatoryBody;

use App\Models\RegulatoryCommitte;
use App\Services\IService;

/**
 * Class RegulatoryBodyService
 * @package App\Services
 */
class RegulatoryBodyService implements IService
{
     public function getAll()
     {

         try {
            $data = [];
            $data = RegulatoryCommitte::orderBy('sort','asc')->with(['profile','committeeType'])->get();
            return $data;

        } catch (\Throwable $th) {
           return $th->getMessage();
        }
     }
     public function create($request)
     {
        $request->validate([
            'profile_id' => 'required',
            'sort' => 'required',
            'committe_type_id' => 'required',
            'post_id' => 'required',
        ]);

        $checkusers = RegulatoryCommitte::where('profile_id',$request->profile_id)->get();
        // return $checkusers;
        if($checkusers){
            foreach ($checkusers as $key => $user) {
                if($user->profile_id == $request->profile_id and $user->committe_type_id == $request->committe_type_id)
                {
                    $data = [
                        'type' => 'error',
                        'msg' => 'User already Exists',
                    ];
                    return $data;
                }
            }
        }

        $newCommitte = New RegulatoryCommitte();
        $newCommitte->profile_id = $request->profile_id;
        $newCommitte->sort = $request->sort;
        $newCommitte->committe_type_id = $request->committe_type_id;
        $newCommitte->post_id = $request->post_id;
        $newCommitte->save();

        $data = [
            'type' => 'success',
            'msg' => 'Data Saved successfully',
        ];
        return $data;
     }
     public function update($request, $id)
     {
        $request->validate([
            'profile_id' => 'required',
            'sort' => 'required',
            'committe_type_id' => 'required',
        ]);

        $data = RegulatoryCommitte::findOrfail($id);
        $data->profile_id       = $request->profile_id;
        $data->sort             = $request->sort;
        $data->committe_type_id = $request->committe_type_id;
        $data->save();

     }

     public function getMemberCommitteeTypeWise($committe_type)
     {

    /**
     * @param committe_type "Sinate = 1, Syndicate = 2, Academic = 3, Finance = 4"
     */

        $members = RegulatoryCommitte::where('committe_type_id', $committe_type)
                ->where('status', 1)
                ->with(['profile','committeeType' => function($q) {
                    $q->select('id','name')->distinct('name');
                }])->get();
        return $members;

     }

     public function delete($id)
     {

     }
     public function getByID($id)
     {

     }
}
