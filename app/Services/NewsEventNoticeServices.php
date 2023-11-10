<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class NewsEventNoticeServices
 * @package App\Services
 */
class NewsEventNoticeServices
{

    public function getAll()
    {
        try {
            $data = News::all();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    /**
     * @param type "News =1, Event =2, Notice =3"
     * @param take "how many row you want"
     */
    public function getSelectedRange($type, $take, $catType = 0)
    {
        try {

            $data = News::where('type', $type)->latest()->take($take)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }

    /**
     * @param type "News =1, Event =2, Notice =3"
     * @param take "how many row you want"
     * @param faculty_id faculty wise"
     */
    public function getNewsEventsNotice($type, $take, $faculty_id)
    {
        try {

            $data = News::where('type', $type)->where('faculty_id', $faculty_id)->latest()->take($take)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }


    public function getNews()
    {
        try {
            $data = News::where(['faculty_id' => 3, 'type' => 1])
                ->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }


    public function getEvent()
    {
        try {
            $data = News::where(['faculty_id' => 3, 'type' => 2])
                ->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }



    public function getByID($id)
    {
        $data = news::find($id);

        return $data;
    }
}
