<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $featured_products = Product::where('is_featured', 1)->where('status', 1)->limit('4')->get();
        $latest_products   = Product::orderBy('id', 'DESC')->where('status', 1)->limit('8')->get();

        return view('frontend.home', compact('featured_products', 'latest_products'));
    }

    public function productDetails($id)
    {
        $product = Product::find($id);

        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->where('status', '1')->limit('8')->get();

        return view('frontend.product-details', compact('product', 'related_products'));
    }

    public function categoryWiseProduct($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $products = Product::where('sub_category_id', $id)->where('status', 1)->orderBy('id', 'DESC')->limit('12')->get();

        return view('frontend.category-wise-product', compact('products', 'subCategory'));
    }

    public function checkout()
    {
        if(Auth::check() && @Auth::user()->type == 'customer' ){

            $cartItems = \Cart::getContent();

            return view('frontend.checkout', compact('cartItems'));
        }else{
            return redirect('user-login');
        }

    }
}
