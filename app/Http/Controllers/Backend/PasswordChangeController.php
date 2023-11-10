<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserLog;
use Session;
use Auth;

class PasswordChangeController extends Controller
{
    //
    public function changePassword()
    {
    	return view('backend.change_password.change-password');
    }

    public function storePassword(Request $request)
    {

    	$request->validate([
            'old_password' => 'required',
    		'new_password' => 'required|min:8',
    		'confirm_password' => 'required|same:new_password',
    	]);
           //    return $request->all();

    	$auth_id = Auth::user()->id;

    	// dd($auth_id);
    	if($request->new_password == $request->confirm_password)
    	{
    		$previous_password = Auth::user()->password;

            // dd(decrypt($previous_password));
            if(Hash::check($request->new_password, $previous_password))
            {
                session()->flash('msg', 'You Can not use old password as new Password!');
                return redirect()->back();
            }
            else{
                if(Hash::check($request->old_password,$previous_password))
                    {
                        $user = User::find($auth_id);
                        $password = Hash::make($request->new_password);
                        // dd($password);
                        $user->password = $password;
                        $user->update();
                        session()->flash('success', 'Password Change Successfully!');
                        return redirect()->route('profile-management.change.password');

                    }
                    else
                    {
                        session()->flash('msg', 'Password does not match with previous password');
                        return redirect()->back();
                    }
            }



    	}

    	// return view('backend.change_password.change-password');
    }

    public function changeProfile()
    {
        $data['auth_info'] = Auth::user();
        return view('backend.change_password.profile_change',$data);
    }

    public function storeProfile(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $auth_info = User::find(Auth::user()->id);
        $auth_info->name = $request->name;
        $auth_info->email = $request->email;
        $img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/user_images/'.$auth_info->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/user_images/', $imgName);
            $auth_info['image'] = $imgName;
        }

        $auth_info->save();
        return redirect()->route('profile-management.change.profile')->with('success','Profile updated Successfully');
    }

}
