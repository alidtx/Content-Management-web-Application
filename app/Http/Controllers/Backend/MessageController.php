<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Office;
use App\Services\Message\MessageService;
use App\Services\Profile\ProfileService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private $profileService;
    private $messageService;

    public function __construct(ProfileService $profileService, MessageService $messageService)
    {
        $this->profileService = $profileService;
        $this->messageService = $messageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['messages'] = $this->messageService->getAll();

        return view('backend.message.message-view')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        // $data['profiles'] = $this->profileService->getAll();
        return view('backend.message.message-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_first_part' => 'required',

        ]);
        $this->messageService->create($request);

        return redirect()->route('message')->with('success', 'Message Saved Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = $this->messageService->getByID($id);
        return view('backend.message.message-add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title_first_part' => 'required',

        ]);

        $this->messageService->update($request, $id);


        return redirect()->route('message')->with('info', 'Message Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->messageService->delete($request->id);
        return redirect()->back();
    }

    public function typeWiseCategory(Request $request)
    {
        if ($request->type_id == 1) {
            $data['categories'] = Faculty::where('status',1)->get();
        } elseif ($request->type_id == 2) {
            $data['categories'] = Department::where('status',1)->get();
        } elseif ($request->type_id == 3) {
            $data['categories'] = Office::where('status',1)->get();
        } elseif ($request->type_id == 4) {
            $data['categories'] = Hall::where('status',1)->get();
        }
        // dd( $data['categories']);
        if (isset($data['categories'])) {
            return response()->json($data['categories']);
        } else {
            return response()->json('fail');
        }
    }
    public function categoryWiseHead(Request $request)
    {
        $data = $this->profileService->headList($request->type_id, $request->category_id);

        if (isset($data)) {
            return $data;
        } else {
            return response()->json('fail');
        }
    }
}
