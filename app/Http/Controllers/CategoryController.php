<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create_categories()
    {
        return view('admin.categories.create-categories');
    }

    public function store_categories()
    {
        $validation = request()->validate([
            'category_name' => 'required',
        ]);

        if ($validation) {
            $category = new Category();
            $category->category_name = $validation['category_name'];
            $category->save();

            return redirect()->route('admin.categories')->with('success', "Category created successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function edit_categories($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit-categories', compact('category'));
    }

    public function update_categories($id)
    {
        $validation = request()->validate([
            'category_name' => 'required',
        ]);

        if ($validation) {
            $category = Category::findOrFail($id);
            $category->category_name = $validation['category_name'];
            $category->update();

            return redirect()->route('admin.categories')->with('success', "Category updated successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function delete_categories($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', "Category deleted successfully!");
    }
}
