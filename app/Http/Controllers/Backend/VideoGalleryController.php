<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use App\Services\VideoGalleryService;

class VideoGalleryController extends Controller
{
    private $videoGalleryService;

    public function __construct(VideoGalleryService $videoGalleryService)
    {
        $this->videoGalleryService = $videoGalleryService;
    }

    // public function videoGallery()
    // {
    //     $data['videoGalleries'] = VideoGallery::where('is_featured',1)->orderBy('publish_date','desc')->get();

    //     return view('frontend.video-gallery')->with($data);
    // }

    public function index()
    {
        $data['videoGalleries'] = $this->videoGalleryService->getAll();
        return view('backend.video_gallery.video_gallery-list')->with($data);
    }

    public function addVideoGallery()
    {

    	return view('backend.video_gallery.video_gallery-add');
    }

    public function storeVideoGallery(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'youtube_link' => 'required',
        ]);
       
        $this->videoGalleryService->create($request);

        return redirect()->route('setup.video_gallery')->with('info', 'Video Gallery store successfully.');
    }

    public function editVideoGallery($id)
    {
        $data['editData'] = $this->videoGalleryService->getByID($id);
        return view('backend.video_gallery.video_gallery-add')->with($data);

    }

    public function updateVideoGallery(Request $request,$id)
    {
            // dd($request->all());
        $request->validate([
            'youtube_link' => 'required',
        ]);
        
        $this->videoGalleryService->update($request,$id);

        return redirect()->route('setup.video_gallery')->with('info','Video Gallery update successfully.');

    }

    public function deleteVideoGallery(Request $request)
    {
        $this->videoGalleryService->delete($request->id);

        return redirect()->route('setup.video_gallery');
    }
}
