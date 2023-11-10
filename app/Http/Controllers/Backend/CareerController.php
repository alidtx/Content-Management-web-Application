<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerAttachment;

class CareerController extends Controller
{
    public function index()
    {
        $data['careers'] = Career::orderBy('date','desc')->get();
        
        return view('backend.career.view',$data);
    }

    public function Add()
    {
        // $data['categories'] = ProgramCategory::all();
    	// return view('backend.program.add',$data);
    	return view('backend.career.add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
        ]);

    	// $params = $request->all();
        // $params['date'] = date('Y-m-d',strtotime($request->date));
        
        // $career = Career::create($params);
        $career = new Career();
        $career->title = $request->title;
        $career->type = $request->type;
        $career->date = date('Y-m-d',strtotime($request->date));
        $career->save();

        if($request->hasFile('attachment'))
        {
            foreach($file = $request->file('attachment') as $key => $val){
                $store = new CareerAttachment();
                $store->career_id = $career->id;
                $filename[$key] = time() . '.' . $file[$key]->getClientOriginalName();
                $file[$key]->move(public_path('upload/career/'), $filename[$key]);
                $store->attachment= $filename[$key];
                $store->save();
            }
        }
    	return redirect()->route('setup.career.view')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Career::find($id);
    	return view('backend.career.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            
        ]);
        $data = Career::find($id);
        $params = $request->all();
        $params['date'] = date('Y-m-d',strtotime($request->date));
        $data->update($params);

        $career = Career::find($id);
        $editDataAttachments = CareerAttachment::where('career_id',$career->id)->get();
        if($request->hasFile('attachment'))
        {
            foreach($file = $request->file('attachment') as $key => $val){
                $store = new CareerAttachment();
                $store->career_id = $career->id;
                $filename[$key] = time() . '.' . $file[$key]->getClientOriginalName();
                $file[$key]->move(public_path('upload/career/'), $filename[$key]);
                $store->attachment= $filename[$key];
                $store->save();
            }
        }
    	return redirect()->route('setup.career.view')->with('success','Data Updated successfully');
    }

    public function destroy(Request $request)
    {
    	$data = Career::find($request->id);
        $data->delete();

        return redirect()->route('setup.career.view')->with('success','Data Deleted successfully');
    }

    public function careerAttachmentRemove(Request $request)
    {
        $data = CareerAttachment::find($request->id);
        @unlink(public_path('upload/career/'.$data->attachment));
        $data->delete();
        return redirect()->back()->with('info','Attachment Deleted Successfully');
    }
}
