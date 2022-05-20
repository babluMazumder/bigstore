<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        try{
        DB::beginTransaction();

            $order_amount = \Cart::getTotal();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $order_amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from tutsmake.com."
        ]);

        $cartItems = \Cart::getContent();


        $order                    = new Order();
        $order->user_id           = Auth::user()->id;
        $order->total_price       = $order_amount;
        $order->total_quantity    = \Cart::getTotalQuantity();

        $order->customer_name     = $request->name;
        $order->customer_mobile   = $request->mobile;
        $order->customer_address  = $request->address;
        $order->save();




        foreach($cartItems as $cartItem)
        {
            $product = Product::find($cartItem->id);

            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $product->id;
            $order_detail->quantity = $cartItem->quantity;
            $order_detail->price = $cartItem->price;
            $order_detail->save();


        }

        \Cart::clear();
        DB::commit();


        return back()->with('success_message', 'Order has beed placed successfully');



        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('danger_message', 'Something went wrong');

        }


    }
}
