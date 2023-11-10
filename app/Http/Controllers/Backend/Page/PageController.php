<?php

namespace App\Http\Controllers\Backend\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Page;
use App\Services\ContentMgt\PageService;

class PageController extends Controller
{
    private $pageService;

    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    public function view()
    {
        $posts = $this->pageService->getAll();
        return view('backend.post.post-view', compact('posts'));
    }

    public function add()
    {
        return view('backend.post.post-add');
    }

    public function store(Request $request)
    {
        $this->pageService->create($request);

        return redirect()->route('frontend-menu.post.view')->with('success', 'Data successfully inserted!');
    }

    public function edit($id)
    {
        $editData = $this->pageService->getByID($id);

        return view('backend.post.post-add', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $this->pageService->update($request, $id);

        return redirect()->route('frontend-menu.post.view')->with('info', 'Data successfully updated!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $this->pageService->delete($id);
        return redirect()->back();
    }
}
