<?php

namespace App\Http\Controllers\Backend\FrontendMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\FrontendMenu;
use App\Models\MenuType;

class FrontendMenuController extends Controller
{
    public function view($id){
        // return $id;
        $menus = FrontendMenu::orderBy('id','desc')->get();
        $menu_type_name = MenuType::find($id);
        // return $menu_type_name;

        return view('backend.post.menu-view', compact('menus','id','menu_type_name'));
    }

    // public function add(){
    //     return view('backend.post.menu-add');
    // }

    private function getToken($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }

    public function singleStore(Request $request){
        // return $request->all();
        if($request->edit_rand_id != null){
            $service = FrontendMenu::where('rand_id',$request->edit_rand_id)->first();
            if($service == null){
                return redirect()->route('frontend-menu.menu.view')->with('error','Sorry never insert menu. Please try again.');
            }
        }else{
            $service = new FrontendMenu();
            $service->parent_id = 0;
            $service->rand_id = $this->getToken(10);
        }

        $service->title_en = $request->title_en;
        $service->title_bn = $request->title_bn;

        $service->slug = slugChecker($editSlug=@$request->edit_rand_id,$slug = $request->title_en);


        if($request->url_link =='#'){
            $service->url_link = null;
        }else if($request->get('url_link_file') != null){
            $imgName = date('YmdHi').'_'.$request->url_link;
            $file_link_decode = @base64_decode(@explode(',', @$request->url_link_file)[1]);
            if(!file_exists(public_path('backend/menu_fle'))){
                mkdir(public_path('backend/menu_fle'), 0777, true);
            }
            file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
            $service['url_link'] = $imgName;
        }else{
            $service->url_link = $request->url_link;
        }
        $service->url_link_type = $request->url_link_type;
        $service->status = $request->status;
        $service->menu_type_id = $request->menu_type_id;
        $service->save();
        return redirect()->route('frontend-menu.menu.view',$request->menu_type_id)->with('success','Well done! successfully inserted');
    }

    public function store(Request $request){
        // return $request->all();
        // dd($request->all());
        DB::transaction(function() use($request){
            $data = json_decode(urldecode($request->nestableoutput));
            // dd($data);
            $x = FrontendMenu::where('menu_type_id',$data[0]->menu_type_id)->get();
            if($x){
                $x->each->delete();
                // dd('ok');
            }

            if(count($data)){
                foreach ($data as $key1 => $datum){
                    $service1 = new FrontendMenu();
                    if($datum->rand_id){
                        $service1->rand_id = $datum->rand_id;
                    }else{
                        $service1->rand_id = $this->getToken(20);
                    }
                    $service1->parent_id = '0';
                    $service1->sort_order = $key1;

                    $service1->title_en = $datum->title_en;
                    $service1->title_bn = $datum->title_bn;
                    $service1->slug = slugChecker($editSlug=@$request->edit_rand_id,$slug = $datum->title_en);
                    $service1->url_link_type = $datum->url_link_type;
                    $service1->status = $datum->status;
                    $service1->menu_type_id = $datum->menu_type_id;
                    if($datum->url_link =='#'){
                        $service1->url_link = null;
                    }else if($datum->url_link_file != null){
                        $imgName = date('YmdHi').'_'.$datum->url_link;
                        $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                        if(!file_exists(public_path('backend/menu_fle'))){
                            mkdir(public_path('backend/menu_fle'), 0777, true);
                        }
                        file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                        $service1->url_link = $imgName;
                    }else{
                        $service1->url_link = $datum->url_link;
                    }
                    // dd('hi');
                    $service1->save();
                    if(@$datum->children){
                        $data = $datum->children;
                        foreach ($data as $key2 => $datum){
                            $service2 = new FrontendMenu();
                            if($datum->rand_id){
                                $service2->rand_id = $datum->rand_id;
                            }else{
                                $service2->rand_id = $this->getToken(10);
                            }
                            $service2->parent_id = $service1->rand_id;
                            $service2->sort_order = $key2;

                            $service2->title_en = $datum->title_en;
                            $service2->title_bn = $datum->title_bn;
                            $service2->slug = slugChecker($editSlug=@$request->edit_rand_id,$slug = $datum->title_en);
                            $service2->url_link_type = $datum->url_link_type;
                            $service2->status = $datum->status;
                            $service2->menu_type_id = $datum->menu_type_id;

                            if($datum->url_link =='#'){
                                $service2->url_link = null;
                            }else if($datum->url_link_file != null){
                                $imgName = date('YmdHi').'_'.$datum->url_link;
                                $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                if(!file_exists(public_path('backend/menu_fle'))){
                                    mkdir(public_path('backend/menu_fle'), 0777, true);
                                }
                                file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                $service2->url_link = $imgName;
                            }else{
                                $service2->url_link = $datum->url_link;
                            }
                            $service2->save();
                            if(@$datum->children){
                                $data = $datum->children;
                                foreach ($data as $key3 => $datum){
                                    $service3 = new FrontendMenu();
                                    if($datum->rand_id){
                                        $service3->rand_id = $datum->rand_id;
                                    }else{
                                        $service3->rand_id = $this->getToken(10);
                                    }
                                    $service3->parent_id = $service2->rand_id;
                                    $service3->sort_order = $key3;

                                    $service3->title_en = $datum->title_en;
                                    $service3->title_bn = $datum->title_bn;
                                    $service3->slug = slugChecker($editSlug=@$request->edit_rand_id,$slug = $datum->title_en);
                                    $service3->url_link_type = $datum->url_link_type;
                                    $service3->status = $datum->status;
                                    $service3->menu_type_id = $datum->menu_type_id;

                                    if($datum->url_link =='#'){
                                        $service3->url_link = null;
                                    }else if($datum->url_link_file != null){
                                        $imgName = date('YmdHi').'_'.$datum->url_link;
                                        $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                        if(!file_exists(public_path('backend/menu_fle'))){
                                            mkdir(public_path('backend/menu_fle'), 0777, true);
                                        }
                                        file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                        $service3->url_link = $imgName;
                                    }else{
                                        $service3->url_link = $datum->url_link;
                                    }
                                    $service3->save();
                                    if(@$datum->children){
                                        $data = $datum->children;
                                        foreach ($data as $key4 => $datum){
                                            $service4 = new FrontendMenu();
                                            if($datum->rand_id){
                                                $service4->rand_id = $datum->rand_id;
                                            }else{
                                                $service4->rand_id = $this->getToken(10);
                                            }
                                            $service4->parent_id = $service3->rand_id;
                                            $service4->sort_order = $key4;

                                            $service4->title_en = $datum->title_en;
                                            $service4->title_bn = $datum->title_bn;
                                            $service4->slug = slugChecker($editSlug=@$request->edit_rand_id,$slug = $datum->title_en);
                                            $service4->url_link_type = $datum->url_link_type;
                                            $service4->status = $datum->status;
                                            $service4->menu_type_id = $datum->menu_type_id;
                                            if($datum->url_link =='#'){
                                                $service4->url_link = null;
                                            }else if($datum->url_link_file != null){
                                                $imgName = date('YmdHi').'_'.$datum->url_link;
                                                $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                                if(!file_exists(public_path('backend/menu_fle'))){
                                                    mkdir(public_path('backend/menu_fle'), 0777, true);
                                                }
                                                file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                                $service4->url_link = $imgName;
                                            }else{
                                                $service4->url_link = $datum->url_link;
                                            }
                                            $service4->save();
                                            if(@$datum->children){
                                                $data = $datum->children;
                                                foreach ($data as $key5 => $datum){
                                                    $service5 = new FrontendMenu();
                                                    if($datum->rand_id){
                                                        $service5->rand_id = $datum->rand_id;
                                                    }else{
                                                        $service5->rand_id = $this->getToken(10);
                                                    }
                                                    $service5->parent_id = $service4->rand_id;
                                                    $service1->sort_order = $key5;

                                                    $service5->title_en = $datum->title_en;
                                                    $service5->title_bn = $datum->title_bn;
                                                    $service5->slug = slugChecker($editSlug=@$request->edit_rand_id,$slug = $datum->title_en);
                                                    $service5->url_link_type = $datum->url_link_type;
                                                    $service5->status = $datum->status;
                                                    $service5->menu_type_id = $datum->menu_type_id;
                                                    if($datum->url_link =='#'){
                                                        $service5->url_link = null;
                                                    }else if($datum->url_link_file != null){
                                                        $imgName = date('YmdHi').'_'.$datum->url_link;
                                                        $file_link_decode = @base64_decode(@explode(',', @$datum->url_link_file)[1]);
                                                        if(!file_exists(public_path('backend/menu_fle'))){
                                                            mkdir(public_path('backend/menu_fle'), 0777, true);
                                                        }
                                                        file_put_contents('public/backend/menu_fle/'.$imgName, @$file_link_decode);
                                                        $service5->url_link = $imgName;
                                                    }else{
                                                        $service5->url_link = $datum->url_link;
                                                    }
                                                    $service5->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
// return "save";
// return redirect()->route('frontend-menu.menu.view')->with('success','Well done! successfully inserted');
return redirect()->back()->with('success','Well done! successfully inserted');
}

public function edit($id){
    $editData = FrontendMenu::find($id);
    $countmenu = FrontendMenu::where('rand_id',$editData->parent_id)->first();
    if($countmenu == null){
        $menu_number['access_id'] = '1';
        $menu_number['parent_id'] = $editData->parent_id;
        $menu_number['sub_parent_id'] = '';
    }else{
        $countsubmenu = FrontendMenu::where('rand_id',$countmenu->parent_id)->first();
        if($countsubmenu == null){
            $menu_number['access_id'] = '2';
            $menu_number['parent_id'] = $editData->parent_id;
            $menu_number['sub_parent_id'] = '0';
        }else{
            $menu_number['access_id'] = '3';
            $menu_number['parent_id'] = $countmenu->parent_id;
            $menu_number['sub_parent_id'] = $editData->parent_id;
        }
    }

    return view('backend.post.menu-add', compact('editData','menu_number'));
}

public function viewMenuType()
{
    $menu_types = MenuType::all();
    return view('backend.post.menu_type.view',compact('menu_types'));
}
public function createMenuType ()
{
    $menu_types = MenuType::all();
    return view('backend.post.menu_type.add');
}


public function storeMenuType(Request $request)
{
    $request->validate([
       'name' => 'required|unique:menu_types,name'
    ]);

    $menu_type = new MenuType();
    $menu_type->name = $request->name;
    $menu_type->save();

    return redirect()->route('frontend-menu.menu_type.view')->with('success','Menu Type added success');
}

public function editMenuType($id)
{
    $editData = MenuType::find($id);
    return view('backend.post.menu_type.add', compact('editData'));
}

public function updateMenuType(Request $request, $id)
{
    $request->validate([
        'name' => 'required|unique:menu_types,name,'.$id
     ]);

    $data = MenuType::find($id);
    $data->name = $request->name;
    $data->save();

    return redirect()->route('frontend-menu.menu_type.view')->with('success','Menu Type Updated Successfully');
}


}

// একটা প্রোডাক্ট সাকসেসফুল করার জন্য খুবই ভালো কোন টিমের বিকল্প নাই। ভালো টিম মানে টিমের ভিতরে সুন্দর কালচার থাকা।
// টিমে সুন্দর কালচার প্রচলন করার জন্য ভদ্রভাবে কথা বলার বিকল্প নাই ।
//আরেকটা উপায় হল প্রশংসা করা। ছোট খাটো হেল্প থেকে বড় হেল্প, বা কেউ কোন ইন্টারেস্টিং কাজ করেছে, সমস্ত কিছু নিয়েই প্রশংসা করার অভ্যাস চালু করা
//টিমের মধ্যে। এর ফলে লং-টার্ম এ টিমের মধ্যে বন্ডিং খুব শক্ত হবে। বন্ডিং ভালো হলে এতগুলো ব্রেন যদি কোন প্রোডাক্ট এর ভালোর জন্য একসাথে কাজ করে,
//সেই প্রোডাক্ট সাকসেস হতে বাধ্য।
// হ্যাঁ , হতে পারে আপনার বর্তমান টিম বা কোম্পানি এরকম মানসিকতা ধারণ করে না। হতে পারে আপনার বর্তমান কোম্পানি আপনাদের কামলা হিসেবে বিবেচনাকরে।
// এক্ষেত্রে আপনি ভালো মতো কাজ শিখে সিনিয়র হয়ে ম্যানেজমেন্ট কে প্রেসার দিবেন সফটওয়্যার ইন্ডাস্ট্রির টিম যেভাবে চালানো উচিত সেভাবে চালাইতে। অথবা দেশের মধ্যেই ভালো কালচার আছে এমন কোম্পানির জন্য নিজেকে গড়ে তুলে সেই কোম্পানি গুলোতে চলে যেতে।
// ডুবন্ত নৌকা বাচানোর জন্য চেষ্টা করা অবশ্যই ভালো গুন। কিন্তু নৌকার বেশীরভাগই যদি কথা না শুনে সমস্যা সমাধান এর চেষ্টা না করে, তাহলে নিজেকে ডুবিয়ে মেরে ফেলা তো কোন মানুষের কাজ হতে পারে না।
// আপনি নিজেই যদি কোম্পানির টপ ম্যানেজমেন্ট হোন, অতি অবশ্যই টিমের জন্য ইনভেস্ট করার মানসিকতা গড়ে তুলুন।
// তাহলে আপনার প্রোডাক্টও বাঁচবে, সাথে টিমের মেম্বারদের বেতন নিয়ে চিন্তা করা লাগবে না। সবাই খুশী হবে। 🥳
