<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->get();
        return view('backend.product.index', compact('products'));
    }

    public function addNew()
    {
        $categories = Category::where('status', 1)->get();
        return view('backend.product.add-new', compact('categories'));
    }

    public function getSubcategory(Request $request)
    {
        $subcategories = SubCategory::where('category_id', $request->category_id)->where('status', 1)->get();
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        // validation

        $image_name = '';
        if($request->hasFile('image')){

            $file     = $request->file('image');
            $filename = date('YmdHi').'-'.$file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);
            $image_name = 'uploads/'.$filename;

        }

        $product                   = new Product();
        $product->name             = $request->name;
        $product->category_id      = $request->category;
        $product->sub_category_id  = $request->sub_category;
        $product->price            = $request->price;
        $product->discounted_price = $request->discounted_price;
        $product->image            = $image_name;
        $product->status           = $request->status;
        $product->is_featured      = $request->is_featured;
        $product->description      = $request->description;
        $result                    = $product->save();

        if($result){
            return back()->with('success_message', 'Product added successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }

    }

    public function edit($id)
    {
        $product        = Product::findorfail($id);
        $categories     = Category::where('status', 1)->get();
        $sub_categories = SubCategory::where('category_id', $product->category_id)->where('status', 1)->get();
        return view('backend.product.edit', compact('categories', 'product', 'sub_categories'));
    }

    public function update(Request $request)
    {
        // validation

        $product = Product::findorFail($request->id);

        $image_name = '';

        if($request->hasFile('image')){

            unlink($product->image);

            $file     = $request->file('image');
            $filename = date('YmdHi').'-'.$file->getClientOriginalName();

            $file->move(public_path('uploads'), $filename);
            $image_name = 'uploads/'.$filename;

        }

        $product->name             = $request->name;
        $product->category_id      = $request->category;
        $product->sub_category_id  = $request->sub_category;
        $product->price            = $request->price;
        $product->discounted_price = $request->discounted_price;

        if($image_name != ''){
            $product->image = $image_name;
        }

        $product->status           = $request->status;
        $product->description      = $request->description;
        $result                    = $product->save();

        if($result){
            return back()->with('success_message', 'Product updated successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }
    }

    public function delete($id)
    {
        $product = Product::findorFail($id);
        unlink($product->image);
        $result = $product->delete();


        if($result){
            return back()->with('success_message', 'Product deleted successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }


    }
}
