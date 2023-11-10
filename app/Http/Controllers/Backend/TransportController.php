<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TransportService;

use App\Model\Transport;

class TransportController extends Controller
{
    public function index(TransportService $transport)
    {
        $data['transport'] = $transport->getAll();
        return view('backend.transport.index')->with($data);
    }

    public function create(Request $request)
    {
        return view('backend.transport.create');
    }

    public function store(Request $request, TransportService $transport)
    {
        $validatedData = $request->validate([
            'route_title' => ['required'],
            'transport_up_root' => ['required'],
            'start_point' => ['required'],
            'end_point' => ['required'],
        ], [
            'route_title.required' => 'Transport Route title is required',
            'transport_up_root.required' => 'Transport Route up route is required',
            'start_point.required' => 'Transport Route start point is required',
            'end_point.required' => 'Transport Route end point is required',
        ]);


        $transport->saveTransport($request);

        return redirect()->route('transport.list')->with('success', 'Transport root add Successfully');
    }

    public function edit($id, TransportService $transport)
    {
        $editData = $transport->getById($id);
        return view('backend.transport.create', compact('editData'));
    }

    public function update(Request $request, $id, TransportService $transport)
    {
        $validatedData = $request->validate([
            'route_title' => ['required'],
            'transport_up_root' => ['required'],
            'start_point' => ['required'],
            'end_point' => ['required'],
        ], [
            'route_title.required' => 'Transport Route title is required',
            'transport_up_root.required' => 'Transport Route up route is required',
            'start_point.required' => 'Transport Route start point is required',
            'end_point.required' => 'Transport Route end point is required',
        ]);

        $transport->updateTransport($request, $id);

        return redirect()->route('transport.list')->with('success', 'Transport root update Successfully');
    }

    public function delete($id, TransportService $transport)
    {
        $transport->delete($id);
        return redirect()->route('transport.list')->with('success', 'Transport root delete Successfully');
    }

}
