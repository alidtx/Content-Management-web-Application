<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TransportService;

use App\Model\Transport;
use App\Model\RouteTime;


class RouteTimeController extends Controller
{
    public function index($id, TransportService $transport)
    {
        $my = $transport->getById($id);
        $data = $transport->getSchedule($id);
        return view('backend.transport.time_index', compact('my','data'));
    }

    public function create($id, TransportService $transport)
    {

        $mine = $transport->getById($id);
        return view('backend.transport.time_create', compact('mine'));
    }

    public function store(Request $request, TransportService $transport)
    {
        // dd($request);

        $request->validate([
            'transport_id' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'route_way' => ['required'],
        ], [
            'transport_id.required' => 'Transport id is required',
            'start_time.required' => 'Transport start time is required',
            'end_time.required' => 'Transport arrival time is required',
            'route_way.required' => 'Transport Route way is required',
        ]);

        $transports = $transport->saveSchedule($request);

        return redirect()->route('route.time.list', $request->transport_id)->with('success', 'Transport route add Successfully');
    }

    public function edit($id, TransportService $transport)
    {

        $editData = $transport->getScheduleById($id);
        $mine = $transport->getById($editData->transport_id);
        return view('backend.transport.time_create', compact('mine', 'editData'));
    }

    public function update(Request $request, $id, TransportService $transport)
    {
        $request->validate([
            'transport_id' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'route_way' => ['required'],
        ], [
            'transport_id.required' => 'Transport id is required',
            'start_time.required' => 'Transport start time is required',
            'end_time.required' => 'Transport arrival time is required',
            'route_way.required' => 'Transport Route way is required',
        ]);

        $editData = $transport->updateSchedule($request, $id);
        return redirect()->route('route.time.list', $request->transport_id)->with('success', 'Transport route edit Successfully');
    }

    public function delete($id, TransportService $transport)
    {
        $transport->deleteSchedule($id);
        return redirect()->route('route.time.list')->with('success', 'Transport route delete Successfully');
    }
}
