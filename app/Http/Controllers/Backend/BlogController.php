<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogPost::with('comment','like_post')
                            ->withCount('comment')
                            ->withCount('like_post')
                            ->get();
        return view('backend.blog_post.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog_post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
           'title' => 'required',
        ]);

        $blog_post = new BlogPost();
        $blog_post->title = $request->title;
        $blog_post->description = $request->description;
        $blog_post->status = $request->status;
        $blog_post->user_id = Auth::user()->id;

        $blog_post->save();

        return redirect()->route('blog.index')->with('success','Blog save succesfully');
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
        $editData = BlogPost::findOrFail($id);
        return view('backend.blog_post.create', compact('editData'));
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
        $request->validate([
            'title' => 'required',
         ]);

         $blog_post = BlogPost::find($id);
         $blog_post->title = $request->title;
         $blog_post->description = $request->description;
         $blog_post->status = $request->status;
         $blog_post->user_id = Auth::user()->id;

         $blog_post->save();

         return redirect()->route('blog.index')->with('success','Blog Update succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // return $request->all();
    }
}
