<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    public function addNew()
    {
        return view('backend.category.add-new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'status' => "required"
        ]);

        $category         = new Category();
        $category->name   = $request->name;
        $category->status = $request->status;
        $result           = $category->save();

        if($result){
            return back()->with('success_message', 'Category has been inserted successfully');
        }else{
            return back()->with('danger_message', 'Category has been inserted unsuccessfully');
        }
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);

        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => "required",
            'status' => "required"
        ]);

        $category = Category::findorfail($request->id);
        $category->name   = $request->name;
        $category->status = $request->status;
        $result           = $category->save();
        if($result){
            return back()->with('success_message', 'Category has been updated successfully');
        }else{
            return back()->with('danger_message', 'Category has been updated unsuccessfully');
        }
    }

    public function delete($id)
    {
        $result           = Category::destroy($id);
        if($result){
            return back()->with('success_message', 'Category has been deleted successfully');
        }else{
            return back()->with('danger_message', 'Category has been deleted unsuccessfully');
        }
    }
}
