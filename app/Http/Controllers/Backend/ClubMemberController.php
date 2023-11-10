<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\AssignToClub;
use App\Models\Club;
use App\Models\ClubDesignation;
use App\Models\ClubMember;
use App\Models\ClubMemberMapping;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubMemberController extends Controller
{
     public function index()
     {
        $club_members = ClubMember::with(['faculty','department','member_detail'=>function($q) {
           $q->leftJoin('clubs','clubs.id', 'assign_to_clubs.club_id');
           $q->leftJoin('club_designations','club_designations.id', 'assign_to_clubs.club_designation_id');
           $q->select('clubs.name as c_name','club_designations.name as d_name','assign_to_clubs.*');
        }])->get();
    // return $club_members;

//         foreach ($club_members as $key => $member) {
//             if(count($member->member_detail) > 0 ) {
//                 foreach ($member->member_detail as $key => $value) {
//                      echo $member->name." ".$value->c_name."<br>";
//                 }
//             }
//         }
//    die();
    //    dd($club_members);

        //  $club_members = DB::table('club_member_mappings')
        //               ->join('club_members','club_member_mappings.club_member_id', '=', 'club_members.id')
        //               ->join('clubs','club_member_mappings.club_id', '=', 'clubs.id')
        //               ->join('club_designations','club_member_mappings.club_designation_id', '=', 'club_designations.id')
        //               ->select('club_member_mappings.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','club_designations.name as designation_name','club_member_mappings.id as cmm_id')
        //               ->get();
        //  $club_members = DB::table('club_member_mappings')
        //               ->leftJoin('clubs','club_member_mappings.club_id', '=', 'clubs.id')
        //               ->leftJoin('club_designations','club_member_mappings.club_designation_id', '=', 'club_designations.id')
        //               ->leftJoin('club_members','club_member_mappings.club_member_id', '=', 'club_members.id')
        //               ->select('club_member_mappings.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','club_member_mappings.id as cmm_id','club_designations.name as d_name')
        //               ->get();
        // return $club_members;
        //  $club_members = DB::table('assign_to_clubs')
        //               ->leftJoin('clubs','assign_to_clubs.club_id', '=', 'clubs.id')
        //               ->leftJoin('club_designations','assign_to_clubs.club_designation_id', '=', 'club_designations.id')
        //               ->leftJoin('club_members','assign_to_clubs.club_member_id', '=', 'club_members.id')
        //               ->select('assign_to_clubs.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','assign_to_clubs.id as cmm_id','club_designations.name as d_name')
        //               ->get();
        // return $club_members->member_detail;
        return view('backend.club.member.list',compact('club_members'));
     }

     public function member_list()
     {
        $club_members = ClubMember::all();
        return view('backend.club.member.member_list', compact('club_members'));
     }

     public function create()
     {
        return view('backend.club.member.add');
     }
     public function store(Request $request)
     {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'student_id' => 'unique:club_members,student_id',
        ],[
            'student_id.required' => 'Please Enter Student ID',
        ]);
        DB::beginTransaction();

        try {
                $new_member = new ClubMember;
                $new_member->student_id        = $request->student_id;
                $new_member->name              = $request->name;
                $new_member->email              = $request->email;
                $new_member->phone              = $request->phone;
                $new_member->faculty_id          = $request->faculty_id;
                $new_member->department_id          = $request->department_id;
                $new_member->image             = $request->image;
                $new_member->short_description = $request->short_description;

               if($request->file('image'))
               {
                $config = array(
                    'name'      => "image",
                    'path'      => 'upload/club/member/image',
                    'width'     => 70,
                    'height'    => 70
                );
                $images = ImageHelper::uploadImage($config);
                // dd($images);
                $new_member['image'] = $images['filename'];
               }
                // return $new_member;
                $new_member->save();

                // $new_member_map = new ClubMemberMapping;
                // $new_member_map->club_member_id      = $new_member->id;
                // $new_member_map->faculty_id          = $request->faculty_id;
                // $new_member_map->department_id          = $request->department_id;
                // $new_member_map->club_id             = $request->club_id;
                // $new_member_map->club_designation_id = $request->club_designation_id;
                // $new_member_map->join_date           = date('Y-m-d H:i:s',strtotime($request->join_date));
                // $new_member_map->save();
            // dd($new_member_map);
        DB::commit();

        } catch (\Exception $th) {
            DB::rollBack();
            return $th->getMessage();
            return redirect()->route('club.member.add')->with('error',$th->getMessage());
        }

        return redirect()->route('club.member.add')->with('success','Club Member Added Successfully!');
     }

     public function edit($id)
     {
        // dd($id);
        $club_members = ClubMember::with(['faculty','department','member_detail'=>function($q) {
            $q->leftJoin('clubs','clubs.id', 'assign_to_clubs.club_id');
            $q->leftJoin('club_designations','club_designations.id', 'assign_to_clubs.club_designation_id');
            $q->select('clubs.name as c_name','club_designations.name as d_name','assign_to_clubs.*');
         }])->find($id);
        // return ClubMemberMapping::findOrFail($id);
        // $club_members = DB::table('club_member_mappings')
        // ->leftJoin('clubs','club_member_mappings.club_id', '=', 'clubs.id')
        // ->leftJoin('club_designations','club_member_mappings.club_designation_id', '=', 'club_designations.id')
        // ->leftJoin('club_members','club_member_mappings.club_member_id', '=', 'club_members.id')
        // ->where('club_member_mappings.id',$id)
        // ->select('club_member_mappings.*','club_members.*','clubs.*','club_designations.*','clubs.name as club_name','club_members.name as member_name','club_member_mappings.id as cmm_id','club_designations.name as d_name')
        // ->first();
        // ->get();
        return  $club_members;
     }

     public function assignToClub()
     {
        $clubs = Club::latest()->get();
        $students = ClubMember::latest()->get();
        $club_designations = ClubDesignation::latest()->get();

        // return  $members;
        return view('backend.club.assign-to.club',compact('students','clubs','club_designations'));
     }
     public function memberAssignToClub(Request $request)
     {
        // return $request->all();
        $request->validate([
            'club_member_id' => 'required',
            'club_id' => 'required',
            'club_designation_id' => 'required',
        ]);

        $is_already_has = AssignToClub::where('club_member_id', $request->club_member_id)
                                      ->where('club_id', $request->club_id)
                                      ->first();
        if($is_already_has){
            return redirect()->back()->with('error','Member already register for this club!');
        }

        $is_already_has_designation = AssignToClub::where('club_id', $request->club_id)
                                      ->where('club_designation_id', $request->club_designation_id !=5)
                                      ->first();

        if($is_already_has_designation){
            return redirect()->back()->with('error','this designation already register for this club!');
        }

        $new_club_assign = New AssignToClub();
        $new_club_assign->club_member_id = $request->club_member_id;
        $new_club_assign->club_id = $request->club_id;
        $new_club_assign->club_designation_id = $request->club_designation_id;
        $new_club_assign->join_date = date('Y-m-d H:i:s',strtotime($request->start_date));
        $new_club_assign->expire_date = date('Y-m-d H:i:s',strtotime($request->end_date));
        $new_club_assign->save();
        return redirect()->back()->with('success','Club Member Added Successfully!');

        // return  $members;
        return view('backend.club.assign-to.club',compact('students','clubs','club_designations'));
     }
}

