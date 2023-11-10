<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\CompletedResearch;
use Illuminate\Http\Request;

class CompletedResearchController extends Controller
{


    public function index()
    {
         $data['completedResearches'] = CompletedResearch::with('profile')->orderBy('date', 'desc')->get();
        return view('backend.completed_research.completed_research-list')->with($data);
    }

    public function add()
    {
        return view('backend.completed_research.completed_research-add');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required|max:20000|mimes:jpg,png,jpeg',
            'file' => 'required|max:100000|mimes:pdf,doc,docx',
        ]);

        $params = $request->all();

        $params['date'] = date('Y-m-d', strtotime($request->date));

        if ($request->image) {
            $config = array(
                'name'      => "image",
                'path'      => 'upload/journal',
                'width'     => 350,
                'height'    => 528
            );
            $image = ImageHelper::uploadImage($config);
            $params['image'] = $image['filename'];
        }

        if ($request->file) {
            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/journal'), $fileName);
            $params['pdf'] = $fileName;
        }
        // dd($params);

        CompletedResearch::create($params);

        return redirect()
            ->route('news.completed_research')
            ->with('info', 'Store successfully.');
    }

    public function edit($id)
    {
        $data['editData'] = CompletedResearch::find($id);
        return view('backend.completed_research.completed_research-add')->with($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'max:20000|mimes:jpg,png,jpeg',
            'file' => 'max:100000|mimes:pdf,doc,docx',
        ]);

        $data = CompletedResearch::find($id);

        $params = $request->all();
        $params['date'] = date('Y-m-d', strtotime($request->date));


        if ($request->image) {
            @unlink(public_path('upload/journal/' . $data->image));
            $config = array(
                'name'      => "image",
                'path'      => 'upload/journal',
                'width'     => 350,
                'height'    => 528
            );
            $image = ImageHelper::uploadImage($config);
            $params['image'] = $image['filename'];
        }

        if ($request->file) {
            @unlink(public_path('upload/journal/' . $data->file));
            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('upload/journal'), $fileName);
            $params['pdf'] = $fileName;
        }
        $data->update($params);
        return redirect()
            ->route('news.completed_research')
            ->with('info', 'Update successfully.');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $deleteData = CompletedResearch::find($id);
        // @unlink(public_path('upload/completed_research/' . $deleteData->pdf));
        $deleteData->delete();
        return redirect()->route('news.completed_research');
    }


}
