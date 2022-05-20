@extends('frontend.master')

@section('mainSection')

<!--banner-->
<div class="banner-top">
    <div class="container">
        <h3>Cart</h3>
        <h4><a href="index.html">Home</a><label>/</label>Cart</h4>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="container text-left mt-5" style="margin-top: 40px">
    @if (\Session::has('success_message'))
        <div class="alert alert-success">
            {!! \Session::get('success_message') !!}

        </div>
    @endif
    @if (\Session::has('danger_message'))
        <div class="alert alert-success">
            {!! \Session::get('danger_message') !!}
        </div>
    @endif
</div>

<!-- contact -->
<div class="check-out">
    <div class="container">
        <div class="spec ">
            <h3>Cart</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>

        <table class="table ">
            <tr>

                <th class="t-head head-it ">Products</th>
                <th class="t-head">Price</th>
                <th class="t-head">Quantity</th>
                <th class="t-head">Total</th>
                <th class="t-head head-it ">Action</th>

            </tr>
            @forelse ($cartItems as $cartItem)
            @php
                $product = App\Models\Product::find($cartItem->id);
            @endphp
            <tr>

                <td class="">
                    <a href="single.html" class="at-in">
                        <img src="{{asset($product->image)}}" class="img-responsive" alt="" width="100">
                    </a>
                    <div class="sed">
                        <h5>{{$product->name}}</h5>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="close1"> <i class="fa fa-times" aria-hidden="true"></i></div>
                </td>
                <td class="t-data">{{$cartItem->price}}</td>
                <td class="t-data">
                    <div class="quantity">
                        <div class="quantity-select">
                            <form action="{{url('update-cart')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$cartItem->id}}">
                                <input type="number"  name="quantity" value="{{$cartItem->quantity}}" min="1">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                </td>
                <td class="t-data">{{$cartItem->price * $cartItem->quantity}}</td>
                <td>
                    <a href="{{url('remove/'.$cartItem->id)}}" class="btn btn-danger btn-sm">Remove</a>
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    <h3>No Product Found</h3>
                </td>
            </tr>
            @endforelse
            <tr>

                <th class="t-head head-it "></th>
                <th class="t-head"></th>
                <th class="t-head">Grand Total</th>
                <th class="t-head">{{\Cart::getTotal()}}</th>
                <th class="t-head head-it "></th>

            </tr>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="{{url('/')}}" class="btn btn-primary">Continue Shopping</a>

            </div>
            <div class="col-md-6 text-right">
                <a href="{{url('/checkout')}}" class="btn btn-success">Checkout</a>
            </div>
        </div>
    </div>
</div>

@endsection
