<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {
        return view('backend.event.list');
    }

    public function create()
    {
        $data['faculties'] = Faculty::all();
        $data['departments'] = Department::all();
        return view('backend.event.add',$data);
    }

    public function store(Request $request)
    {
        return $data = $request->all();

         $event = array();
         $event['event_for'] = $request->event_for;

        // if(!empty($request->faculty_id) || !empty($request->department_id)){
        //     foreach ($request->faculty_id as $key => $facultyid) {
        //         array_push($event['faculty_id'], $facultyid);
        //         foreach ($request->department_id as $key => $departmentid) {
        //            array_push($event['department_id'], $departmentid);
        //         }
        //     }

        // }

        $event['faculty_id'] = $request->faculty_id;
        $event['department_id'] = $request->department_id;
        $event['club_id'] = $request->club_id;

        $event['title'] = $request->title;
        $event['description'] = $request->description;
        $event['location'] = $request->location;
        $event['start_date'] = date('Y-m-d H:i:s',strtotime($request->start_date));
        $event['end_date'] = date('Y-m-d H:i:s',strtotime($request->end_date));
        $event['visible'] = $request->visible;
        $event['show_on_homepage'] = $request->show_on_homepage;

        // dd($event);
        Event::create($event);

        return $event;
    }

}
