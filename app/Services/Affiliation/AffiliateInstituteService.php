<?php

namespace App\Services\Affiliation;

use App\Helpers\ImageHelper;
use App\Models\Affiliation;
use App\Services\IService;

/**
 * Class AffiliateInstituteService
 * @package App\Services
 */
class AffiliateInstituteService implements IService
{

    public function getAll()
    {
        $data = Affiliation::all();
        return $data;
    }

    public function getFirstSixAffiliateInstitute($take)
    {
        $data = Affiliation::orderBy('id','asc')->take($take)->get();
        return $data;
    }
    public function getFeaturedAffiliation()
    {
        $data = Affiliation::where('is_featured', 1)->orderBy('id','asc')->get();
        return $data;
    }

    public function getAffiliateInstituteFromApi()
    {
        $data = Affiliation::pluck('inst_id')->toArray();
        // return $data;
        $url = "https://ioc.bup.edu.bd/api/v1/institute";
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', $url);
        $apiData = json_decode($res->getBody()->getContents(), true);

        $clientdata = [];
        $uniqueFacultyIds = [];
        foreach($apiData as $key=>$datum) {
            if(!in_array($datum['inst_id'], $data) && $datum['inst_id'] != NULL)
            {
                if(!in_array($datum['inst_id'], $uniqueFacultyIds))
                {
                    $uniqueFacultyIds[] = $datum['inst_id'];
                    $clientdata[] = $datum;
                }
            }
        }

        return $clientdata;
    }

    public function storeAffiliationInstituteFromApi()
    {
        $url = "https://ioc.bup.edu.bd/api/v1/institute";
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', $url);
        $apiData = json_decode($res->getBody()->getContents(), true);

        foreach ($apiData as $key => $datum) {
            $affilate = New Affiliation();
            $affilate->inst_id = $datum['inst_id'];
            $affilate->inst_name = $datum['inst_name'];
            $affilate->inst_description = $datum['inst_description'];
            $affilate->institution_type = $datum['institutionType'];
            $affilate->location = $datum['location'];
            $affilate->url =  NULL;
            $affilate->image = NULL;

            $affilate->save();
        }
    }

    public function create($request)
    {
        try {
            $params = $request->all();
            $img = $request->file('image');
            if ($img) {
                $config = [
                    'name' => 'image',
                    'path' => 'upload/affiliation/',
                    'height' => 70,
                    'width' => 70,
                ];

                $image = ImageHelper::uploadImage($config);
            }
            $params['image'] = $image['filename'];
            Affiliation::create($params);

            $msg = [
                'type' => 'success',
                'msg' => 'Affiliation institute Added Successfully',
            ];

            return $msg;

        } catch (\Throwable $th) {
            //throw $th;
            $msg = [
                "type" => 'error',
                'msg' => $th->getMessage(),
            ];

            return $msg;

        }

    }

    public function update($request, $id)
    {
        try {
            $data = $this->getByID($id);

            $params = $request->all();
            // return $params;
            $img = $request->file('image');
            if ($img) {
                $config = [
                    'name' => 'image',
                    'path' => 'upload/affiliation/',
                    'height' => 70,
                    'width' => 70,
            ];

            $image = ImageHelper::uploadImage($config);

            }

            $params['image'] = $image['filename'];
            $params['is_featured'] = $request->is_featured ?? 0;
            $data->update($params);

            $msg = [
                'type' => 'success',
                'msg' => 'Affiliation institute Updated Successfully',
            ];

            return $msg;

        } catch (\Throwable $th) {
            //throw $th;
            $msg = [
                "type" => 'error',
                'msg' => $th->getMessage(),
            ];

            return $msg;

        }
    }

    public function delete($id)
    {

    }

    public function getByID($id)
    {
         return Affiliation::find($id);
    }
    public function getByType($type)
    {
         $data =  Affiliation::where('institution_type' , $type)->get();
         return $data;
    }

}
