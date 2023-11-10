<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\JournalPaper;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    private $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['journalPapers'] = JournalPaper::orderBy('created_at', 'DESC')->get();
        return view('backend.journal_paper.journal_paper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $data['departments'] = $this->departmentService->getAll();
        return view('backend.journal_paper.journal_paper_add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'paper_title' => 'required',
            'attachment1' => 'max:20000|mimes:jpg,png,jpeg',
            'attachment2' => 'max:100000|mimes:pdf,doc,docx',
        ]);

        $params = $request->all();
        $params['date'] = date('Y-m-d', strtotime($request->date));

        if ($request->attachment1) {
            $imageName = time() . '.' . $request->attachment1->getClientOriginalExtension();
            $request->attachment1->move(public_path('upload/journal'), $imageName);
            $params['attachment1'] = $imageName;
        }

        if ($request->attachment2) {
            $fileName = time() . '.' . $request->attachment2->getClientOriginalExtension();
            $request->attachment2->move(public_path('upload/journal'), $fileName);
            $params['attachment2'] = $fileName;
        }

        JournalPaper::create($params);

        return redirect()
            ->route('news.journal_paper.list')
            ->with('success', 'Journal Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = JournalPaper::find($id);
        return view('backend.journal_paper.journal_paper_add')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return ($request->all());
        $request->validate([
            'paper_title' => 'required',
            'attachment1' => 'mimes:jpg,png,jpeg',
            'attachment2' => 'mimes:pdf,doc,docx',
        ]);
        $data = JournalPaper::find($id);


        $params = $request->all();
        $params['date'] = date('Y-m-d', strtotime($request->date));

        if ($request->attachment1) {
            @unlink(public_path('upload/journal/' . $data->attachment1));
            $imageName = time() . '.' . $request->attachment1->getClientOriginalExtension();
            $request->attachment1->move(public_path('upload/journal'), $imageName);
            $params['attachment1'] = $imageName;
        }

        if ($request->attachment2) {
            @unlink(public_path('upload/journal/' . $data->attachment2));
            $fileName = time() . '.' . $request->attachment2->getClientOriginalExtension();
            $request->attachment2->move(public_path('upload/journal'), $fileName);
            $params['attachment2'] = $fileName;
        }

        $data->update($params);

        return redirect()
            ->route('news.journal_paper.list')
            ->with('info', 'Journal Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
