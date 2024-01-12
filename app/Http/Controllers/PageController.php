<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class PageController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('user.index', compact('blogs'));
    }

    public function show_blog($id)
    {
        $blog = Blog::findOrFail($id);

        return view('user.show-blog', compact('blog'));
    }
}
