<?php

use App\Models\FrontendMenu;
use App\Models\MenuPermission;


if ( !function_exists( 'slugChecker' ) ) {
    function slugChecker($editSlug,$slug) {
        $slug = str_replace(' ', '-',preg_replace('/[^A-Za-z0-9- ]/', '', Str::lower($slug)));
        $where[] = ['slug','=',$slug];
        if($editSlug){
            $where[] = ['rand_id','!=',$editSlug];
        }
        $slug_exist = FrontendMenu::where($where)->first();
        if($slug_exist){
            $explode_array = explode('-',$slug);
            $slug = str_replace('-'.((int)end($explode_array)),'',$slug);
            $slug = $slug.'-'.((int)end($explode_array)+1);
            return slugChecker($editSlug,$slug);
        }else{
            return $slug;
        }
    }
}

if ( !function_exists( 'menuUrl' ) ) {
    function menuUrl($menu) {
    	$route_url['menu'] = Str::slug(@$menu->url_link);
    	$route_url['menu_id'] = @$menu->id;

        return (@$menu->url_link)?(route('menu_url',$route_url)):'#' ;
    }
}

if(!function_exists('inner_permission')){
	function inner_permission($permitted_route){
		if(Auth::user()->id=='1'){
			return true;
		}
		
		$user_role_array=Auth::user()->user_role;
		if(count($user_role_array)==0){
			$user_role = [];
		}else{
			foreach($user_role_array as $rolee){
				$user_role[] = $rolee->role_id;
			}
		}
		
		$existpermission = MenuPermission::where('permitted_route',$permitted_route)->whereIn('role_id',@$user_role)->first();
		if($existpermission){
			return true;
		}else{
			return false;
		}
	}
}
