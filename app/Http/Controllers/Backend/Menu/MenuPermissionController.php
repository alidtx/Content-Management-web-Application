<?php
namespace App\Http\Controllers\Backend\Menu;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuPermission;
use App\Models\MenuRoute;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MenuPermissionController extends Controller{

	public function index(Request $request){        
		$data['role'] = Role::all();
		$data['parent_menu_all'] = Menu::where('parent',0)->where([['id','!=',1],['status','1']])->orderBy('sort','asc')->get();
		return view('backend.menu.view-menu-permission',$data);
	}

	public function storePermission(Request $request){
		
		DB::beginTransaction();
		try {
			DB::table('menu_permissions')->delete();
			// MenuPermission::delete();
			foreach ($request->menu_list as $ml){
				$split_data = explode('@', $ml);
				//dd($split_data);
				$p = new MenuPermission;
				$p->menu_id 		= explode('=', $split_data[0])[1];
				$p->role_id 		= explode('=', $split_data[1])[1];
				$p->permitted_route = explode('=', $split_data[2])[1];
				$p->menu_from 		= explode('=', $split_data[3])[1];
				$p->save();
			}

			DB::commit();
			return redirect()->route('user.permission')->with('success', 'Menu Permission has saved successfully.');
		} catch (\Exception $e) {
			DB::rollback();
			return redirect()->route('user.permission')->with('error', 'Sorry!! Menu permissions were not saved successfully.');
		}

	}

}

