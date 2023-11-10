<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnCampusFacility;

class OnCampusFacilitesController extends Controller
{
    public function FacilityList()
    {
        $facilities = OnCampusFacility::all();
        return view('backend.facilities.list', compact('facilities'));
    }

    public function FacilityEdit($id)
    {
        $data = OnCampusFacility::find($id);
        return view('backend.facilities.edit', compact('data'));
    }

    public function FacilityUpdate($id, Request $request)
    {
        $data = $request->all();

        if ($request->has('image')){
            $config = array(
                'name' => 'image',
                'path' => 'upload/on_campus',
                'height' => 300,
                'width' => 300,
            );
            $image = ImageHelper::uploadImage($config);
        }
        $data['image'] = $image['filename'];

        $facilites = OnCampusFacility::find($id);
        $facilites->update($data);

        return back()->with('success', 'Data Update Success');
    }
}
