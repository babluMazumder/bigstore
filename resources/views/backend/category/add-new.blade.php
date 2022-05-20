@extends('backend.master')


@section("mainContent")

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('dashboard')}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{url('category')}}" class="breadcrumb-link">Category List</a></li>
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

                <!-- horizontal form -->
                <!-- ============================================================== -->
                <div class="col-12">
                    <div class="card">
                        <h5 class="card-header">Add New</h5>
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
                            <form id="form" data-parsley-validate="" novalidate="" action="{{url('category/store')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Name</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputEmail2" type="text" required="" name="name" placeholder="Name" class="form-control">
                                        @error('name')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="input-select" class="col-3 col-lg-2 col-form-label text-right">Status</label>
                                    <div class="col-9 col-lg-10">
                                        <select class="form-control" id="input-select" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row pt-2 pt-sm-5 mt-1">
                                    <div class="col-sm-12 pl-0">
                                        <p class="text-right">

                                            <button class="btn btn-space btn-secondary">Cancel</button>
                                            <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end horizontal form -->
                <!-- ============================================================== -->
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
