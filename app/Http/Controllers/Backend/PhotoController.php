<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RahulHaque\Filepond\Facades\Filepond;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Image;

class PhotoController extends Controller
{
    public function index()
    {
    	$data['galleries'] = Gallery::all();
    	//$data['galleries'] = Image::all();
        // return $data;
        return view('backend.photo.view', $data);
    }

    public function Add()
    {
        $data['categories'] = GalleryCategory::all();
    	return view('backend.photo.add',$data);
    }

    public function cropImageSave(Request $request)
    {
        $folderPath = public_path('upload/gallery_images/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $cropImageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$cropImageName;
        file_put_contents($imageFullPath, $image_base64);
        //  $saveFile = new Picture;
        //  $saveFile->name = $cropImageName;
        //  $saveFile->save();
        session()->put('crop_image_name',$cropImageName);

        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }

    public function StoreImage(Request $request)
    {
        return $request->all();
        $this->validate($request, [
            'gallery.*' => Rule::filepond([
                'required',
                'image',
                'max:2000'
            ])
        ]);
        echo "test";
        $galleryName = 'gallery-' . auth()->id();

        $fileInfos = Filepond::field($request->gallery)
            ->moveTo('galleries/' . $galleryName);
        dd($fileInfos);

    }

    public function avatarStore(Request $request)
    {
        return $request->all();
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'gallery_category_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png'
        ],[
            'gallery_category_id.required' => 'Select Gallery Category',
        ]);

    	$params = $request->all();
    	$img = $request->file('image');
        if ($img) {
            if(!session()->get('crop_image_name'))
            {
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/gallery_images/', $imgName);
                $params['image'] = $imgName;
            }
            else
            {
                $params['image'] = session()->get('crop_image_name');
                session()->remove('crop_image_name');
            }
        }
        Gallery::create($params);
    	return redirect()->route('setup.photo')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Gallery::find($id);
        $data['categories'] = GalleryCategory::all();
    	return view('backend.photo.add',$data);
    }

    public function Update(Request $request,$id)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'
        // ]);
        $data = Gallery::find($id);
        $params = $request->all();
    	$img = $request->file('image');
        if ($img) {
            //dd(session()->get('crop_image_name'));
            if(file_exists(public_path('upload/gallery_images/'.$data->image)))
            {
                @unlink(public_path('upload/gallery_images/'.$data->image));
            }
            if(!session()->get('crop_image_name'))
            {
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/gallery_images/', $imgName);
                $params['image'] = $imgName;
            }
            else
            {
                $params['image'] = session()->get('crop_image_name');
                session()->remove('crop_image_name');
            }
        }
        $data->update($params);
    	return redirect()->route('setup.photo')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
        $data = Gallery::find($request->id);
        if($data->image)
        {
            if(file_exists(public_path('upload/gallery_images/'.$data->image)))
            {
                @unlink(public_path('upload/gallery_images/'.$data->image));
            }
        }
        $data->delete();

        return redirect()->route('setup.photo')->with('success','Data Deleted successfully');
    }

    public function PhotosUpload(Request $request)
    {
        return ($request->all());
    }
}
