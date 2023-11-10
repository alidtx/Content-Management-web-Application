<?php

namespace App\Services\ContentMgt;

use App\Helpers\ImageHelper;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class PageService implements IService
{

    public function getAll()
    {
        try {
            $data = Page::where('status', '1')->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function create(Request $request)
    {
        $data                   = new Page();
        $data->type             = $request->type;
        $data->title            = $request->title;
        $data->meta_title       = $request->meta_title;
        $data->meta_keyword     = $request->meta_keyword;
        $data->description      = $request->description;
        $data->meta_description = $request->meta_description;
        if ($request->has('image')) {
            $config = array(
                'name' => 'image',
                'path' => 'upload/pages',
                'height' => 200,
                'width' => 1340,
            );
            $image = ImageHelper::uploadImage($config);
        }
        $data->image            = $image['filename'];
        $data->created_by       = Auth::user()->id;

        $data->save();
    }
    public function getByID($id)
    {
        $data = Page::find($id);

        return $data;
    }
    public function update(Request $request, $id)
    {
        $data = Page::find($id);
        $data->type             = $request->type;
        $data->title            = $request->title;
        $data->meta_title       = $request->meta_title;
        $data->meta_keyword     = $request->meta_keyword;
        $data->description      = $request->description;
        $data->meta_description = $request->meta_description;
        if ($request->has('image')) {
            $config = array(
                'name' => 'image',
                'path' => 'upload/pages',
                'height' => 235,
                'width' => 1340,
            );
            $image = ImageHelper::uploadImage($config);
        }
        $data->image            = $image['filename'];
        $data->created_by       = Auth::user()->id;
        
        try {
            $data->save();
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function delete($id)
    {
        $deleteData = Page::find($id);
        $deleteData->delete();

        return true;
    }
}
