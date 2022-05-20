<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::with('category')->get();
        return view('backend.subCategory.index', compact('subCategories'));
    }

    public function addNew()
    {
        $categories = Category::where('status', 1)->get();
        return view('backend.subCategory.add-new', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'status' => "required",
            'category' => "required"
        ]);


        $subCategory                = new SubCategory();
        $subCategory->name          = $request->name;
        $subCategory->status        = $request->status;
        $subCategory->category_id   = $request->category;

        $result = $subCategory->save();

        if($result){
            return back()->with('success_message', 'Sub Category has been inserted successfully');
        }else{
            return back()->with('danger_message', 'Sub Category has been inserted unsuccessfully');
        }
    }
    public function edit($id)
    {
        $subCategory = SubCategory::findorfail($id);
        $categories = Category::where('status', 1)->get();
        return view('backend.subCategory.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => "required",
            'status' => "required",
            'category' => "required"
        ]);


        $subCategory                = SubCategory::findorfail($request->id);
        $subCategory->name          = $request->name;
        $subCategory->status        = $request->status;
        $subCategory->category_id   = $request->category;

        $result = $subCategory->save();

        if($result){
            return back()->with('success_message', 'Sub Category has been updated successfully');
        }else{
            return back()->with('danger_message', 'Sub Category has been updated unsuccessfully');
        }
    }

    public function delete($id)
    {
        $result           = SubCategory::where('id', $id)->delete();
        if($result){
            return back()->with('success_message', 'Sub Category has been deleted successfully');
        }else{
            return back()->with('danger_message', 'Sub Category has been deleted unsuccessfully');
        }
    }
}
