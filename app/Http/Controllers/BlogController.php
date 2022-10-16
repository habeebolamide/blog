<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
        public function index( Request $request)
        {
            return Inertia::render('Blog/CreateBlog');
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
        }
}
