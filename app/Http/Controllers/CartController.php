<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('frontend.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {

        $product = Product::find($request->product_id);

        $price   = $product->discounted_price;
        if($product->discounted_price == 0){
            $price = $product->price;
        }

        $result = \Cart::add([
            'id' => $request->product_id,
            'name' => $product->name,
            'price' => $price,
            'quantity' => $request->quantity
        ]);

        if($result){
            return back()->with('success_message', 'Product added to cart successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }
    }

    public function removeCart($id)
    {
        $result = \Cart::remove($id);
        if($result){
            return back()->with('success_message', 'Product removed successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }
    }

    public function updateCart(Request $request)
    {
        $result = \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        if($result){
            return back()->with('success_message', 'Cart updated successfully');
        }else{
            return back()->with('danger_message', 'Something went wrong');
        }
    }


}
