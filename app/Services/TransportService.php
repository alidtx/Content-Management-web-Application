<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\RouteTime;
use DB;

class TransportService
{
    public function getAll()
    {
        return Transport::all();
    }

    public function getById($id)
    {
        $data = Transport::find($id);
        return $data;
    }

    public function saveTransport(Request $request)
    {
        // dd($request);
        $data = new Transport();
        $data->route_title = $request->route_title;
        $data->start_point = $request->start_point;
        $data->end_point = $request->end_point;
        $data->transport_up_root = $request->transport_up_root;
        $data->transport_down_root = $request->transport_down_root;
        $data->save();
        return $data;
    }

    public function updateTransport(Request $request, $id)
    {
        $data = Transport::find($id);
        $result = $data->update($request->all());
        return $result;
    }

    public function delete($id)
    {
        $data = Transport::find($id);
        $data->delete();
        $schedules = RouteTime::where('transport_id', $id)->delete();
        return true;
    }

    public static function rootWay()
    {
        // $data = DB::table('transports')->select('id','route_title', 'start_point', 'end_point')->get();

        // $data = DB::table('transports')
        // 					->join('route_times', 'transports.id', '=', 'route_times.transport_id')
        // 					->select('transports.id', 'transports.route_title', 'route_times.start_time', 'route_times.end_time')->get();

        // $data = DB::table('transports')
        // 				->join('route_times', function($join){
        // 					$join->on('transports.id', '=', 'route_times.transport_id')->where('route_times.route_way', '1');
        // 				})->select('transports.id', 'transports.route_title', 'transports.start_point', 'transports.end_point', 'transports.transport_root', 'route_times.start_time', 'route_times.end_time')->get();

        // $data = Transport::select('id', 'route_title', 'start_point', 'end_point', 'transport_root')->with(['up','down'])->find(1);

        $data = Transport::select('id', 'route_title AS title', 'start_point', 'end_point', 'transport_up_root', 'transport_down_root')
            ->with([
                'up' => function ($w1) {
                    $w1->select('id', 'transport_id', 'start_time', 'end_time');
                },
                'down' => function ($w2) {
                    $w2->select('id', 'transport_id', 'start_time', 'end_time');
                },
            ])
            ->get();

        return $data;
    }

    public function getSchedule($id)
    {
        $data = RouteTime::where('transport_id', $id)->get();
        return $data;
    }

    public function getScheduleById($id)
    {
        $data = RouteTime::find($id);
        return $data;
    }

    public function saveSchedule(Request $request)
    {
        $data = RouteTime::Create($request->all());
        return $data;
    }

    public function updateSchedule(Request $request, $id)
    {
        $data = RouteTime::find($id);
        $result = $data->update($request->all());
        return $result;
    }
    public function deleteSchedule($id)
    {
        $data = RouteTime::find($id);
        $data->delete();
        return true;
    }
}
