<?php

namespace App\Http\Controllers;

use App\Models\ClubMember;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;

class PersonalUserController extends Controller
{
    public function userAdd()
    {
    	$data['roles'] = Role::all();
    	$data['profiles'] = Profile::all();
    	return view('backend.user.personal_to_user',$data);
    }

    public function find_single_profile(Request $request)
    {

        try {
            if($request->profile_id) {
                return Profile::where('id', $request->profile_id)->select(['nameEn','email','mobile'])->get()->toArray();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function find_single_student(Request $request)
    {

        try {
            if($request->profile_id) {
                return ClubMember::where('id', $request->profile_id)->select(['name','email','phone'])->get()->toArray();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function userStore(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);



    	$data                    = new User();
        $data->name              = $request->name;
        $data->profile_id        = $request->profile_id;
    	// $data->username       = $request->username;
    	$data->email             = $request->email;
        $data->mobile            = $request->mobile;



        $data->password    = bcrypt($request->password);
        $data->status = $request->status ?? 0;

        if ($file = $request->file('image'))
        {
            $filename = date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user'), $filename);
            $data->image = $filename;
        }

    	$data->save();

        if ($request->role_id) {
            $user_data           = new UserRole();
            $user_data->user_id  = $data->id;
            $user_data->role_id  = $request->role_id;
            $user_data->save();
        }
    	return redirect()->route('user')->with('success','Member Saved successfully');
    }

    public function clubUserAdd()
    {
        $data['roles'] = Role::all();
    	$data['profiles'] = ClubMember::all();
    	return view('backend.user.club_member_to_user',$data);
    }

    public function club_member_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);



    	$data                    = new User();
        $data->name              = $request->name;
        $data->profile_id        = $request->profile_id;
    	// $data->username       = $request->username;
    	$data->email             = $request->email;
        $data->mobile            = $request->mobile;



        $data->password    = bcrypt($request->password);
        $data->status = $request->status ?? 0;

        if ($file = $request->file('image'))
        {
            $filename = date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user'), $filename);
            $data->image = $filename;
        }

    	$data->save();

        if ($request->role_id) {
            $user_data           = new UserRole();
            $user_data->user_id  = $data->id;
            $user_data->role_id  = $request->role_id;
            $user_data->save();
        }
    	return redirect()->route('user')->with('success','Club member Saved successfully');
    }

}
