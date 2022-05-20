@extends("frontend.master")
@section('mainSection')
    <div class="banner-top">
        <div class="container">
            <h3 >{{$subCategory->name}}'s Products</h3>
            <h4><a href="{{url('/')}}">Home</a><label>/</label>{{$subCategory->name}}'s Products</h4>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="content-top offer-w3agile">
        <div class="container ">
                <div class="spec ">
                    <h3>{{$subCategory->name}}'s Products</h3>
                        <div class="ser-t">
                            <b></b>
                            <span><i></i></span>
                            <b class="line"></b>
                        </div>
                </div>
                            <div class=" con-w3l wthree-of">
                                @forelse ($products as $product)

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
                                               <a href="{{url('product-details/'.$product->id)}}"> <button class="btn btn-danger my-cart-btn my-cart-b" data-id="1" data-name="product 1" data-summary="summary 1" data-price="6.00" data-quantity="1" data-image="{{asset('frontend/')}}/images/of16.png">View Details</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @empty
                                <div class="text-center">
                                    <h3>No  Product Found</h3>
                                </div>
                                @endforelse



                                <div class="clearfix"></div>
                            </div>
                        </div>
    </div>

@endsection
