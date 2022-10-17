<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
        public function index( Request $request)
        {
            return Inertia::render('Blog/Partials/CreateBlog');
        }
        public function create(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);
            $create_blogs = Blog::create([
                'title' => $request->title,
                'content' => $request->content,
            ]);
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
            $blog = Blog::where('id',$id)->first();
            // dd($blog);
            return Inertia::render('Blog/Partials/Details', ['blog' => $blog]);
        }
}
