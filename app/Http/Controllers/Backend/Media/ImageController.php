<?php

namespace App\Http\Controllers\Backend\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\TemporaryImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('folder')) {
            Session::remove('folder');
            Session::remove('filename');
        }
        return view('backend.photo.upload');
    }


    public function store(Request $request)
    {
        return $request->all();
        $temporaryFolder = Session::get('folder');
        $namefile = Session::get('filename');

        for ($i = 0; $i < count($temporaryFolder); $i++) {
            $temporary = TemporaryImage::where('folder', $temporaryFolder[$i])->where('image', $namefile[$i])->first();

            if ($temporary) { //if exist
                // dd($temporary);

                Image::create([
                    'folder' => $temporaryFolder[$i],
                    'image' => $namefile[$i],
                ]);

                //hapus file and folder temporary
                $path = storage_path() . '/app/files/tmp/' . $temporary->folder . '/' . $temporary->image;
                if (File::exists($path)) {

                    Storage::move('files/tmp/' . $temporary->folder . '/' . $temporary->image, 'files/' . $temporary->folder . '/' . $temporary->image);

                    File::delete($path);
                    rmdir(storage_path('app/files/tmp/' . $temporary->folder));

                    //delete record in temporary table
                    $temporary->delete();
                }
            }
        }

        Session::remove('folder');
        Session::remove('filename');

        return response()->json(['status' => false, 'message' => 'Data Berhasil diupload']);
    }
}
