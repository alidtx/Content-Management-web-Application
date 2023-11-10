<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{


    public function index()
    {

    	$data['documentList'] = Document::get();
        return view('backend.document.list',$data);
    }

    public function add()
    {

        $data['TrainingWorkShopMember'] = Document::with('member')->get();
    	return view('backend.document.add', $data);
    }

    public function store(Request $request)
    {

        $request->validate([

            'title' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'document' => 'required|mimes:pdf,doc,docx',

        ]);

    	$data           = new Document();
        $data->title     = $request->title;

        if($request->hasfile('image')){

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/trainingimage',$image_name);
            $data->image=$image_name;
        }


        if($request->hasfile('document')){

            $image=$request->file('document');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/training',$image_name);
            $data->document=$image_name;
        }

        $data->save();
    	return redirect()->route('manage_document')->with('success','Data Saved successfully');
    }


    public function edit($id)

    {

    	$data['editData'] = Document::find($id);
        $data['TrainingWorkShopMember'] = Document::with('member')->get();
    	return view('backend.document.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'image' => 'mimes:jpg,png,jpeg',
            'document' => 'mimes:pdf,docx',
        ]);

    	$data           = Document::find($id);
        $data->title     = $request->title;

        if($request->hasfile('image')){

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/trainingimage',$image_name);
            $data->image=$image_name;
        }

        if($request->hasfile('document')){
            $image=$request->file('document');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/training',$image_name);
            $data->document=$image_name;
        }
        $data->save();
    	return redirect()->route('manage_document')->with('success','Data Updated successfully');
    }

    public function delete(Request $request)
    {
    	$data = Document::find($request->id);
        $data->delete();
        return redirect()->route('manage_document')->with('success','Data Deleted successfully');
    }






}
