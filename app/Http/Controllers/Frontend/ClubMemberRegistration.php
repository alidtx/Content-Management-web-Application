<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Mail\ClubMemberVerification;
use App\Models\ClubMember;
use App\Models\ClubMemberMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ClubMemberRegistration extends Controller
{
    public function registrationForm()
    {
        return view('frontend.club.member.registration');
    }
    public function registration(Request $request)
    {
    //    return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'student_id' => 'required|unique:club_members,student_id',
            'email' => 'required|unique:club_members,email',
            'phone' => 'required|unique:club_members,phone',
            // 'faculty_id' => 'required',
            // 'depratment_id' => 'required',
            // 'club_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        DB::beginTransaction();
        try {
                $new_member = new ClubMember();
                $new_member->student_id         = $request->student_id;
                $new_member->faculty_id         = $request->faculty_id;
                $new_member->department_id      = $request->department_id;
                $new_member->name               = $request->name;
                $new_member->email              = $request->email;
                $new_member->phone              = $request->phone;
                $new_member->verify_token       = Str::random(40);
                if($request->file('photo')){
                    $config = [
                       'name'  => 'photo',
                       'path'  => 'upload/club/member/image',
                       'width' => 70,
                       'height' => 70,
                    ];
                    $image = ImageHelper::uploadImage($config);
                    // dd($image);
                    $new_member->image = $image['filename'];
                }
                // dd($new_member);
                // return $new_member;
                $new_member->save();

                // $new_member_map = new ClubMemberMapping();
                // $new_member_map->club_member_id      = $new_member->id;
                // $new_member_map->faculty_id          = $request->faculty_id;
                // $new_member_map->department_id       = $request->department_id;
                // $new_member_map->club_id             = $request->club_id;
                // $new_member_map->club_designation_id = $request->club_designation_id;
                // $new_member_map->join_date           = date('Y-m-d H:i:s',strtotime($request->join_date));
                // $new_member_map->save();

                Mail::to($request->email)->send(new ClubMemberVerification($new_member));
            DB::commit();

        } catch (\Exception $th) {
            DB::rollBack();
            // return redirect()->route('member.add')->with('error',$th->getMessage());
            return $th->getMessage();
        }

        return "registration success";
    }
    public function verify($token = null)
    {
         if($token != null){
            $user = ClubMember::where('verify_token',$token)->first();
            if($user){
                $user->verify_token = '';
                $user->status = 1;
                $user->save();
                return "Account Acivated";
            }else{
               return "invalid token";     
            }
         }
         return "user Not found";
    }
   
    public function getUsers()
    {
        return "usesggg";
    }
}
