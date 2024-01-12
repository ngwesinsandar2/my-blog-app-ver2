<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function blogs()
    {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create_blogs()
    {
        $categories = Category::all();

        return view('admin.blogs.create-blogs', compact('categories'));
    }

    public function store_blogs()
    {
        $validation = request()->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($validation) {
            $image = request('image');
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/images/blogs'), $image_name);

            $blog = new Blog();
            $blog->title = $validation['title'];
            $blog->user_id = auth()->user()->id;
            $blog->category_id = $validation['category'];
            $blog->description = $validation['description'];
            $blog->image_name = $image_name;
            $blog->save();

            return redirect()->route('admin.blogs')->with('success', "Blog created successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function show_blog($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.show-blog', compact('blog'));
    }

    public function edit_blogs($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();

        return view('admin.blogs.edit-blogs', compact('blog', 'categories'));
    }

    public function update_blogs($id)
    {
        $validation = request()->validate([
            'title' => 'required',
            'description' => 'required',
            // 'image' => 'required',
        ]);

        if ($validation) {
            $blog = Blog::findOrFail($id);
            $blog->title = $validation['title'];
            $blog->description = $validation['description'];
            $blog->category_id = request('category');

            if (request('image')) {
                $image = request('image');
                $image_name = uniqid() . "_" . $image->getClientOriginalName();
                $image->move(public_path('assets/images/blogs'), $image_name);
                $blog->image_name = $image_name;
            } else {
            }

            $blog->update();

            return redirect()->route('admin.blogs')->with('success', "Blog updated successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function delete_blogs($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs')->with('success', "Blog deleted successfully!");
    }
}
