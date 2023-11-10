<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Profile;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{
    
	public function getUserRole(Request $request){
		$user_role_type_id = $request->user_role_type_id;
		$allRole = Role::where('user_role_type_id',$user_role_type_id)->get();
		return response()->json($allRole);
	}

    public function index(){
        $data['user'] = User::with(['user_roles'])->where('id','!=',1)->get();
        $data['role'] = Role::all();

    	return view('backend.user.view-user',$data);
    }

    public function userAdd()
    {
    	$data['roles'] = Role::all();
    	return view('backend.user.add-user',$data);
    }

    public function userStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required',
            'image' => 'mimes:jpg,jpeg,png'
        ]);



    	$data              = new User();
        $data->name        = $request->name;
    	// $data->username    = $request->username;
    	$data->email       = $request->email;
        $data->mobile       = $request->mobile;



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
    	return redirect()->route('user')->with('success','Data Saved successfully');
    }

    public function userEdit($id)
    {
        $data['editData']   = User::with(['user_roles'])->where('id','!=',1)->findOrFail($id);
        // dd($data['editData']->toArray());
        $data['roles']      = Role::where('status','1')->get();
        return view('backend.user.add-user',$data);
    }

    public function updateUser(Request $request,$id)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png'
        ]);
        // $this->validate($request,[
        //     'email'=>'required|email|unique:users,email,'.$data->id
        // ]);

        $data              = User::find($id);

    	$data->name        = $request->name;
        // $data->username    = $request->username;
        $data->mobile       = $request->mobile;
        $data->email       = $request->email;

        // $data->designation  = $request->designation;
    	// $data->department   = $request->department;
    	// $data->bup_id       = $request->bup_id;
        // $data->address       = $request->address;

        $data->status = $request->status ?? 0;

        if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/user/'.$data->image));
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/user'), $filename);
            $data->image = $filename;
        }

        // $photo_path = \App\Models\Profile::find(648)->photo_path;

        // if ($photo_path)
        // {
        //     $info = pathinfo($photo_path);
        //     $contents = file_get_contents($photo_path);
        //     $file = public_path('upload/user/') . $info['basename'];
        //     file_put_contents($file, $contents);
        //     $uploaded_file = new UploadedFile($file, $info['basename']);
        //     dd($uploaded_file);
        // }

    	$data->save();
        if ($request->role_id) {
            $user_data           = UserRole::where('user_id', $id)->first();
            if(!$user_data){
                $user_data           = new UserRole();
                $user_data->user_id  = $data->id;
                $user_data->role_id  = $request->role_id;
                $user_data->save();
            }else{
                $user_data->role_id  = $request->role_id;
                $user_data->save();
            }

        }

        return redirect()->route('user')->with('success','Data Updated successfully');
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('user')->with('success','Data Deleted successfully');
    }

    public function userStatus(Request $request)
    {
        //return $request->all();
        $data = User::findOrFail($request->id);
        $data->status = $request->status;
        $data->save();
        return response()->json(['success' => 'Status Updated Successfully.']);
    }
}
