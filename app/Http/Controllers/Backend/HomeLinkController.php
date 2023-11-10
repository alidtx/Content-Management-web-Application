<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeLink;
class HomeLinkController extends Controller
{
    public function viewHomeLink(){
        $data['homeLinks'] = HomeLink::get();
        return view('backend.home_link.view-home-link',with($data));
     }
     public function addHomeLink(){
         $data['editData'] = NULL;
        return view('backend.home_link.add-home-link', $data);
     }
     public function storeHomeLink(Request $request){
      
       $this->validate($request, [
         'name' => 'required',
         'url_link' => 'required',
       ]);

       $data = new HomeLink;
       $data->name = $request->name;
       $data->url_link = $request->url_link;
       $data->status = $request->status;
       $data->save();
       return redirect()->route('home_link')->with('success','Data Saved successfully');


     }
     public function editHomeLink($id){
         $data['editData'] = HomeLink::find($id);
         return view('backend.home_link.add-home-link', $data);
     }
     public function updateHomeLink(Request $request, $id){

         $this->validate($request, [
           'name' => 'required',
           'url_link' => 'required',
         ]);

         $data = HomeLink::findOrFail($id);
         $data->name = $request->name;
         $data->url_link = $request->url_link;
         $data->status = $request->status;
         $data->save();

         return redirect()->route('home_link')->with('success','Data Updated successfully');

       }

     public function deleteHomeLink(Request $request){

         $data = HomeLink::find($request->id);
         $data->delete();
     }
}
