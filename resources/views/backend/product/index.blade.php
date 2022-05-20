@extends('backend.master')

@section('mainContent')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Product List</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->



            <div class="row">
                <!-- ============================================================== -->
                <!-- contextual table -->
                <!-- ============================================================== -->
                <div class="col-12">
                    <div class="card">
                        <div class="row" style="padding: 10px 20px 0px 20px;">
                            <div class="col-md-6">
                                <h5 class="">Product List</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{url('product/add-new')}}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>


                        <div class="card-body">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category(Sub-category)</th>
                                        <th scope="col">Price(Discounted price)</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)

                                    <tr class="table-primary">
                                        <th scope="row">{{++$key}}</th>
                                        <td><img src="{{asset($product->image)}}" alt="image" class="backend-image"></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->subcategory->category->name}} ({{$product->subcategory->name}})</td>
                                        <td>{{$product->price}} ({{$product->discounted_price}})</td>
                                        <td>
                                            @if ($product->status == 1)
                                                <button class="btn btn-success">Active</button>
                                            @else
                                                <button class="btn btn-warning">Inactive</button>
                                            @endif
                                        </td>
                                        <td><a href="{{url('product/edit', $product->id)}}" class="btn btn-info">Edit</a><a onclick="return confirm('Are you sure to delete this item.?')" href="{{url('product/delete', $product->id)}}" class="btn btn-danger">Delete</a></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
@endsection
