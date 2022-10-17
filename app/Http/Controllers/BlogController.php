<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Blog/Partials/CreateBlog');
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $path = 'public/images/';
        $create_blogs = Blog::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
       $create_blogs->avatar = ($request->avatar == "undefined") ? "https://res.cloudinary.com/crownbirthltd/image/upload/v1597424758/psitywq3w0z4wzpojmp8.png" : uploadAvater($request->avatar, $path, $create_blogs->id);
       $create_blogs->save();
        if ($create_blogs) return $create_blogs;
    }
    public function getblogs(Request $request)
    {

        $getblogs = Blog::paginate(10);
        return response()->json(['status' => true, 'data' => $getblogs]);
        dd($getblogs);
    }
    public function details(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        // dd($blog);
        return Inertia::render('Blog/Partials/Details', ['blog' => $blog]);
    }
    public function edit(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        return Inertia::render('Blog/Partials/Edit', ['blog' => $blog]);
    }
    public function update_blog(Request $request, $blog_id)
    {
        $update_blog = Blog::where('id', $blog_id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($update_blog) 
        return true;
    }
}
