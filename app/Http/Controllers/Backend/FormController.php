<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FormController extends Controller
{


    public function index()
    {
    	$data['form']= Form::get();
        return view('backend.manage_form.view',$data);
    }


    public function Add()
    {

    	return view('backend.manage_form.add');
    }

    public function Store(Request $request)
    {
    //    return $request->all();

        $request->validate([

          'pdf_file'=>'required|mimes:pdf,doc,docx',


        ]);


    	$data = new Form();
        $data->title = $request->title;
        $data->publish_date = $request->publish_date;
        $data->status = $request->status;
        // $data->file = $request->pdf_file;
        if ($request->hasfile('pdf_file')) {

            $image = $request->file('pdf_file');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/form', $image_name);
            $data->file = $image_name;
        }

        $data->save();
    	return redirect()->route('setup.manage_form')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {

    	$data['editData'] = Form::find($id);

    	return view('backend.manage_form.edit',$data);
    }



    public function Update(Request $request,$id)
    {
        //return $request->all();
    	$data = Form::find($id);
        $data->title = $request->title;
        $data->publish_date = $request->publish_date;
        $data->status = $request->status;

        if ($request->hasfile('pdf_file')) {

            if ($request->post('id') > 0) {

                $arrImage = DB::table('forms')->where(['id' => $request->post('id')])->get();

                if (Storage::exists('/public/media/form/' . $arrImage[0]->image)) {

                    Storage::delete('/public/media/form/' . $arrImage[0]->image);
                }
            }

            $image = $request->file('pdf_file');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/form', $image_name);
            $data->file = $image_name;
        }


        $data->save();
    	return redirect()->route('setup.manage_form')->with('success','Data Updated successfully');
    }



}
