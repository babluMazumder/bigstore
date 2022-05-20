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
                                <li class="breadcrumb-item"><a href="{{url('product')}}" class="breadcrumb-link">Product List</a></li>
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
                        <h5 class="card-header">Edit</h5>
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
                            <form id="form" data-parsley-validate="" novalidate="" action="{{url('product/update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Name</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputEmail2" type="text" required="" value="{{$product->name}}" name="name" placeholder="Name" class="form-control">
                                        @error('name')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="input-select" class="col-3 col-lg-2 col-form-label text-right">Category</label>
                                    <div class="col-9 col-lg-10">
                                        <select class="form-control category" id="input-select" name="category">
                                            <option value="">Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected':''}}>{{$category->name}}</option>
                                            @endforeach

                                        </select>
                                        @error('category')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input-select" class="col-3 col-lg-2 col-form-label text-right">Sub-category</label>
                                    <div class="col-9 col-lg-10">
                                        <select class="form-control sub-category" id="input-select" name="sub_category">
                                            <option value="">Select One</option>
                                            @foreach ($sub_categories as $sub_category)
                                                <option value="{{$sub_category->id}}" {{$product->sub_category_id == $sub_category->id ? 'selected':''}}>{{$sub_category->name}}</option>
                                            @endforeach


                                        </select>
                                        @error('sub_category')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Price</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputEmail2" type="number" required="" value="{{$product->price}}" name="price" placeholder="Price" class="form-control">
                                        @error('price')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Discounted Price</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputEmail2" type="number" required="" value="{{$product->discounted_price}}" name="discounted_price" placeholder="Discounted Price" class="form-control">
                                        @error('discounted_price')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Image</label>
                                    <div class="col-9 col-lg-10">
                                        <input id="inputEmail2" type="file" required="" name="image" placeholder="Image" class="form-control">
                                        @error('image')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                        <img src="{{asset($product->image)}}" alt="image" class="backend-image">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="input-select" class="col-3 col-lg-2 col-form-label text-right">Status</label>
                                    <div class="col-9 col-lg-10">
                                        <select class="form-control" id="input-select" name="status">
                                            <option value="">Select Status</option>
                                            <option value="1" {{$product->status == 1 ? 'selected':''}}>Active</option>
                                            <option value="0" {{$product->status == 0 ? 'selected':''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="error text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail2" class="col-3 col-lg-2 col-form-label text-right">Description</label>
                                    <div class="col-9 col-lg-10">
                                        <textarea id="inputEmail2" type="text" required="" name="description" placeholder="Description" class="form-control summernote" rows="10">{{$product->description}}</textarea>
                                        @error('name')
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

<input type="hidden" id="url" value="{{url('/')}}">

@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });



        $(document).ready(function() {
            $(".category").on('change', function() {

                var category_id = $(this).val();
                var _token      = $('input[name="_token"]').val();
                var url         = $('#url').val();


                $.ajax({
                    url: url + "/product/subcategory",
                    method: "POST",
                    data: {
                        category_id: category_id,
                        _token: _token
                    },
                    success: function(result) {

                        $('.sub-category option:not(:first)').remove();

                        var options = '';
                        $( result ).each(function( index, value) {
                            options += '<option value="'+value.id+'">'+value.name+'</option>';
                        });
                        $(".sub-category").append(options);


                    }
                });



            });
        })
    </script>

@endsection
