@extends('frontend.master')


@section('mainSection')
    <div class="banner-top">
        <div class="container">
            <h3 >Product Details</h3>
            <h4><a href="{{url('/')}}">Home</a><label>/</label>Product Details</h4>
            <div class="clearfix"> </div>
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
    </div>
            <div class="single">
                <div class="container">
                            <div class="single-top-main">
                <div class="col-md-5 single-top">
                <div class="single-w3agile">

    <div id="picture-frame">
                <img src="{{asset($product->image)}}" data-src="{{asset($product->image)}}" alt="" class="img-responsive"/>
            </div>
                                            <script src="{{asset('frontend/')}}/js/jquery.zoomtoo.js"></script>
                                    <script>
                $(function() {
                    $("#picture-frame").zoomToo({
                        magnify: 1
                    });
                });
            </script>



                </div>
                </div>
                <div class="col-md-7 single-top-left ">
                                    <div class="single-right">
                    <h3>{{$product->name}}</h3>


                    <div class="pr-single">
                    <p class="reduced "><del>{{$product->price}}</del>{{$product->discounted_price}}</p>
                    </div>
                    <p class="in-pa">
                        {!!$product->description!!}
                    </p>

                    <ul class="social-top">
                        <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                        <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                        <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                        <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
                    </ul>
                    <form action="{{url('/add-to-cart')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="number" name="quantity" value="1" min="1" placeholder="Quantity">
                        <div class="add add-3">
                            <button class="btn btn-danger my-cart-btn my-cart-b">Add to Cart</button>
                        </div>
                    </form>



                <div class="clearfix"> </div>
                </div>


                </div>
            <div class="clearfix"> </div>
        </div>


        </div>
    </div>
            <!---->
    <div class="content-top offer-w3agile">
        <div class="container ">
                <div class="spec ">
                    <h3>Related Products</h3>
                        <div class="ser-t">
                            <b></b>
                            <span><i></i></span>
                            <b class="line"></b>
                        </div>
                </div>
                            <div class=" con-w3l wthree-of">
                                @foreach($related_products as $product)

                                <div class="col-md-3 pro-1">
                                    <div class="col-m">
                                    <a href="{{url('product-details/'.$product->id)}}" class="offer-img">
                                            <img src="{{asset($product->image)}}" class="img-responsive" alt="">
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                                <h6><a href="{{url('product-details/'.$product->id)}}">{{$product->name}}</h6>
                                            </div>
                                            <div class="mid-2">
                                                <p ><label>{{$product->price}}</label><em class="item_price">{{$product->discounted_price}}</em></p>

                                                <div class="clearfix"></div>
                                            </div>
                                                <div class="add add-2">
                                               <a href="{{url('product-details/'.$product->id)}}"> <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="{{asset('frontend/')}}/images/of16.png">Add to Cart</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        </div>
    </div>

@endsection
